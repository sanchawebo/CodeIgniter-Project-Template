<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * @property string $country_code
 * @property string $display_name_de
 * @property string $display_name_en
 * @property string $displayName
 * @property int    $id
 */
class CountryEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'id' => 'int',
    ];

    public function getDisplayName()
    {
        return $this->attributes['display_name_en'];
    }
}
