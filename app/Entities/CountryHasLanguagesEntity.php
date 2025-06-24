<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * @property string $country_code
 * @property int    $id
 * @property string $lang_code
 */
class CountryHasLanguagesEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'id' => 'int',
    ];
}
