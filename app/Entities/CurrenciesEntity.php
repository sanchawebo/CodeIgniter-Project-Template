<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * @property string $currency_code
 * @property int    $id
 */
class CurrenciesEntity extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [
        'id' => 'int',
    ];
}
