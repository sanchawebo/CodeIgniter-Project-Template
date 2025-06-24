<?php

namespace App\Database\Seeds;

use App\Models\CountryModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $langs = [
            [
                'country_code'    => 'GB',
                'display_name_en' => 'United Kingdom',
                'display_name_de' => 'Vereinigtes Königreich',
                'created_at'      => Time::now(),
                'updated_at'      => Time::now(),
                'deleted_at'      => null,
            ],
            [
                'country_code'    => 'DE',
                'display_name_en' => 'Germany',
                'display_name_de' => 'Deutschland',
                'created_at'      => Time::now(),
                'updated_at'      => Time::now(),
                'deleted_at'      => null,
            ],
        ];

        $model = model(CountryModel::class);

        $this->db->transException(true)->transStart();
        $this->db->disableForeignKeyChecks();

        foreach ($langs as $lang) {
            $model->builder()->upsert($lang);
        }

        $this->db->enableForeignKeyChecks();
        $this->db->transComplete();
    }
}
