<?php

namespace App\Database\Seeds;

use App\Models\CurrenciesModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CurrenciesSeeder extends Seeder
{
    public function run()
    {
        $fields = [
            [
                'currency_code' => 'GBP',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
                'deleted_at'    => null,
            ],
            [
                'currency_code' => 'EUR',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
                'deleted_at'    => null,
            ],
        ];

        $model = model(CurrenciesModel::class);

        $this->db->transException(true)->transStart();
        $this->db->disableForeignKeyChecks();

        foreach ($fields as $field) {
            $model->builder()->upsert($field);
        }

        $this->db->enableForeignKeyChecks();
        $this->db->transComplete();
    }
}
