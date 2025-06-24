<?php

namespace App\Database\Seeds;

use App\Models\LanguageModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class LangSeeder extends Seeder
{
    public function run()
    {
        $langs = [
            [
                'lang_code'    => 'en',
                'display_name' => 'English',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
                'deleted_at'   => null,
            ],
            [
                'lang_code'    => 'de',
                'display_name' => 'Deutsch',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
                'deleted_at'   => null,
            ],
        ];

        $model = model(LanguageModel::class);

        $this->db->transException(true)->transStart();
        $this->db->disableForeignKeyChecks();

        foreach ($langs as $lang) {
            $model->builder()->upsert($lang);
        }

        $this->db->enableForeignKeyChecks();
        $this->db->transComplete();
    }
}
