<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * @property string $country_code
 * @property string $currency_code
 * @property int    $id
 */
class CountryHasCurrenciesEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'id' => 'int',
    ];
}
