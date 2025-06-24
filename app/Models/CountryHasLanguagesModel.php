<?php

namespace App\Models;

use App\Entities\CountryHasLanguagesEntity;
use CodeIgniter\Model;

class CountryHasLanguagesModel extends Model
{
    protected $table            = 'country_has_languages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = CountryHasLanguagesEntity::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'country_code',
        'lang_code',
    ];
    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
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

    public function findPrimary(string $countryCode): string|null
    {
        /** @var CountryHasLanguagesEntity|null */
        $entity = $this->where('country_code', $countryCode)->first();
        if ($entity === null) {
            return null;
        }

        return $entity->lang_code;
    }

    /**
     * Formats findAll() to output it in <options> for a select-input.
     */
    public function findAllForSelect(string $countryCode): array
    {
        $res = $this
            ->where('country_code', $countryCode)
            ->join('languages', 'country_has_languages.lang_code=languages.lang_code')
            ->orderBy('display_name')
            ->findAll();

        $resFormat = [];
        if (! empty($res)) {
            foreach ($res as $entry) {
                $resFormat[$entry->lang_code] = $entry->display_name;
            }

            return $resFormat;
        }

        return $res;
    }
}
