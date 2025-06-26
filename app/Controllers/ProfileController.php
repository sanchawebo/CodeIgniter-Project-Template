<?php

namespace App\Controllers;

use App\Models\LanguageModel;
use App\Models\UserSettingsModel;
use CodeIgniter\Shield\Exceptions\ValidationException;

class ProfileController extends BaseController
{
    protected $viewPath = 'user/profile/';

    public function tabSettings()
    {
        if (session('magicLogin')) {
            // Then its a redirect aka magic-link-login
            session()->removeTempdata('magicLogin');
            session()->setFlashdata('password-info', lang('Auth.resetPassword.notification'));
        }
        $data = [
            'languageList' => model(LanguageModel::class)->findAllForSelect(),
            'userLang'     => model(UserSettingsModel::class)->getLang(auth()->id()),
            'selectedTab'  => 'settings',
        ];

        return view($this->viewPath . 'index', $data);
    }

    /**
     * * @http POST
     */
    public function tabSettingsLang()
    {
        $userId = auth()->id();
        $data   = [
            'languageList' => model(LanguageModel::class)->findAllForSelect(),
            'userLang'     => model(UserSettingsModel::class)->getLang($userId),
            'selectedTab'  => 'settings',
        ];

        if (! $this->validate(['frontend_lang' => 'required'])) {
            return redirect()->back()->withInput();
        }

        $userSettings  = model(UserSettingsModel::class);
        $validatedData = $this->validator->getValidated();

        $res = $userSettings->where('user_id', $userId)->first();
        if ($res !== null) {
            // @phpstan-ignore offsetAccess.notFound
            $isSuccess = $userSettings->update($res['id'], $validatedData);
        } else {
            $validatedData['user_id'] = $userId;
            $isSuccess                = $userSettings->insert($validatedData);
        }
        if (! $isSuccess) {
            return redirect()->back()->with('langIsSuccess', 'false');
        }

        session()->set('lang', $validatedData['frontend_lang']);

        return redirect()->to('profile')->with('langIsSuccess', 'true');
    }

    /**
     * * @http POST
     */
    public function tabSettingsPassword()
    {
        $data = [
            'selectedTab'       => 'settings',
            'userLang'          => model(UserSettingsModel::class)->getLang(auth()->id()),
            'passwordIsSuccess' => false,
        ];

        if (! $this->validate('changePassword')) {
            return $this->returnFragment($this->viewPath . 'tab_settings', $data, 'password-form') . $this->oobCsrfSwap();
        }
        $user     = auth()->user();
        $userId   = $user->id;
        $userData = $user->fill($this->request->getPost());
        $model    = auth()->getProvider();

        try {
            $model->update($userId, $userData);
        } catch (ValidationException $e) {
            return $this->returnFragment($this->viewPath . 'tab_settings', $data, 'password-form') . $this->oobCsrfSwap();
        }

        $user->undoForcePasswordReset();
        $data['passwordIsSuccess'] = true;

        return $this->returnFragment($this->viewPath . 'tab_settings', $data, 'password-form') . $this->oobCsrfSwap();
    }
}
