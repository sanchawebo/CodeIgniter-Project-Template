<?php

namespace App\Controllers;

class LanguageController extends BaseController
{
    public function changeLang(string $langCode)
    {
        $session = session();
        $config  = config('App');
        $langs   = $config->supportedLocales;

        if (in_array($langCode, $langs, true)) {
            $session->set('lang', $langCode);
        }

        return redirect()->back();
    }

    public function postChangeLang()
    {
        if (! $this->validate(['lang' => 'required|exact_length[2,3]'])) {
            return redirect()->back();
        }
        $langCode = $this->validator->getValidated()['lang'];

        $session = session();
        $config  = config('App');
        $langs   = $config->supportedLocales;

        if (in_array($langCode, $langs, true)) {
            $session->set('lang', $langCode);
        }

        return redirect()->back();
    }
}
