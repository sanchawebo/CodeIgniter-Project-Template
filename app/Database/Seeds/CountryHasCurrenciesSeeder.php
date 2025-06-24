<?php

namespace App\Database\Seeds;

use App\Models\CountryHasCurrenciesModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CountryHasCurrenciesSeeder extends Seeder
{
    public function run()
    {
        $fields = [
            [
                'country_code'  => 'GB',
                'currency_code' => 'GBP',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
                'deleted_at'    => null,
            ],
            [
                'country_code'  => 'DE',
                'currency_code' => 'EUR',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
                'deleted_at'    => null,
            ],
        ];

        $model = model(CountryHasCurrenciesModel::class);

        $this->db->transException(true)->transStart();
        $this->db->disableForeignKeyChecks();

        foreach ($fields as $field) {
            $model->builder()->upsert($field);
        }

        $this->db->enableForeignKeyChecks();
        $this->db->transComplete();
    }
}
