<?php

namespace App\Database\Seeds;

use App\Models\CountryHasLanguagesModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class CountryHasLanguagesSeeder extends Seeder
{
    public function run()
    {
        $langs = [
            [
                'country_code' => 'GB',
                'lang_code'    => 'en',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
                'deleted_at'   => null,
            ],
            [
                'country_code' => 'DE',
                'lang_code'    => 'de',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
                'deleted_at'   => null,
            ],
        ];

        $model = model(CountryHasLanguagesModel::class);

        $this->db->transException(true)->transStart();
        $this->db->disableForeignKeyChecks();

        foreach ($langs as $lang) {
            $model->builder()->upsert($lang);
        }

        $this->db->enableForeignKeyChecks();
        $this->db->transComplete();
    }
}
