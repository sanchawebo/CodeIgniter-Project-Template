<?php

namespace App\Models;

use CodeIgniter\Model;

class LanguageModel extends Model
{
    protected $table            = 'languages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'lang_code',
        'display_name',
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
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Formats findAll() to output it in <options> for a select-input.
     */
    public function findAllForSelect()
    {
        $res       = $this->orderBy('display_name', 'asc')->findAll();
        $resFormat = [];
        if (! empty($res)) {
            foreach ($res as $entry) {
                $resFormat[$entry['lang_code']] = $entry['display_name'];
            }

            return $resFormat;
        }

        return $res;
    }

    public function getDisplayName(string $langCode): ?string
    {
        /** @var array|null */
        $result = $this
            ->where('lang_code', $langCode)
            ->first();

        return ($result) ? $result['display_name'] : null;
    }
}
