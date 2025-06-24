<?php

namespace App\Models;

use CodeIgniter\Model;

class ParameterModel extends Model
{
    protected $table            = 'parameters';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'country_code',
        'lang_code',
        'name',
        'value',
    ];
    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = true;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = false;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getValue(string $name, string $countryCode = 'GB', string $langCode = 'en'): string
    {
        $result = $this
            ->where('country_code', $countryCode)
            ->where('lang_code', $langCode)
            ->where('name', $name)
            ->find();

        if (empty($result)) {
            $result = $this
                ->where('country_code', 'GB')
                ->where('lang_code', 'en')
                ->where('name', $name)
                ->find();
        }

        return $result[0]['value'] ?? '';
    }
}
