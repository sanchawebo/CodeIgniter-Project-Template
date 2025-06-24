<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OmniSeeder extends Seeder
{
    public function run()
    {
        // Basic Stuff
        $this->call('CountrySeeder');
        $this->call('LangSeeder');
        $this->call('CountryHasLanguagesSeeder');
        $this->call('ParamSeeder');
    }
}
