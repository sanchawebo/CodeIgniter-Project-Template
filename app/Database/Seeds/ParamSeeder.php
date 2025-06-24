<?php

namespace App\Database\Seeds;

use App\Models\ParameterModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ParamSeeder extends Seeder
{
    public function run()
    {
        $params = [
            [
                'country_code' => 'GB',
                'lang_code'    => 'en',
                'name'         => 'front_cover_subline_max_chars',
                'value'        => '160',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
                'deleted_at'   => null,
            ],
            [
                'country_code' => 'GB',
                'lang_code'    => 'en',
                'name'         => 'back_cover_max_addresses',
                'value'        => '12',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
                'deleted_at'   => null,
            ],
            [
                'country_code' => 'GB',
                'lang_code'    => 'en',
                'name'         => 'selection_min_variants',
                'value'        => '1',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
                'deleted_at'   => null,
            ],
            [
                'country_code' => 'GB',
                'lang_code'    => 'en',
                'name'         => 'selection_max_variants',
                'value'        => '10000',
                'created_at'   => Time::now(),
                'updated_at'   => Time::now(),
                'deleted_at'   => null,
            ],
        ];

        $model = model(ParameterModel::class);

        $this->db->transException(true)->transStart();
        $this->db->disableForeignKeyChecks();

        foreach ($params as $param) {
            $model->builder()->upsert($param);
        }

        $this->db->enableForeignKeyChecks();
        $this->db->transComplete();
    }
}
