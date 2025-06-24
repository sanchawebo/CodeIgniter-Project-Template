<?php

namespace App\Cells\LangSwitcher;

use App\Models\LanguageModel;
use CodeIgniter\View\Cells\Cell;

class LangDropdownCell extends Cell
{
    protected $languages;

    public function mount(): void
    {
        $config = config('App');

        $supportedLocales = $config->supportedLocales;
        $dbLangs          = model(LanguageModel::class)->findAll();

        $result = [];

        foreach ($dbLangs as $key => $array) {
            if (in_array($array['lang_code'], $supportedLocales, true)) {
                $result[] = $array;
            }
        }

        $this->languages = $result;
    }

    public function getLanguagesProperty()
    {
        return $this->languages;
    }
}
