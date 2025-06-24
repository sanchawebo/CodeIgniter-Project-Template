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
        $this->call('CurrenciesSeeder');
        $this->call('CountryHasCurrenciesSeeder');
        $this->call('CountryHasLanguagesSeeder');
        $this->call('ParamSeeder');
        // Misc Catalogue
        $this->call('HeadlinesSeeder');
        $this->call('KeyVisualsSeeder');
        $this->call('OrderTypesSeeder');
        $this->call('LeafletTypesSeeder');
        $this->call('FrontCoverBindersSeeder');
        $this->call('BackCoverFootersSeeder');
        // Catalogue Products Stuff
        $this->call('CatalogueDataSeeder');
    }
}
