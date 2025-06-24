<?php

namespace App\Controllers;

use CodeIgniter\Shield\Exceptions\ValidationException;

class ResetPasswordController extends BaseController
{
    protected $viewPath = 'auth/';

    public function show()
    {
        if (session('magicLogin')) {
            // Then its a redirect aka magic-link-login
            session()->removeTempdata('magicLogin');
            session()->setFlashdata('password-info', lang('Auth.resetPassword.notification'));
        }

        return view($this->viewPath . 'reset_password');
    }

    /**
     * * @http POST
     */
    public function resetPassword()
    {
        $data = [
            'passwordIsSuccess' => false,
        ];

        if (! $this->validate('resetPassword')) {
            return redirect()->back()->withInput();
        }
        $user     = auth()->user();
        $userId   = $user->id;
        $userData = $user->fill($this->request->getPost());
        $model    = auth()->getProvider();

        try {
            $model->update($userId, $userData);
        } catch (ValidationException $e) {
            return redirect()->back()->withInput();
        }

        $user->undoForcePasswordReset();
        $data['passwordIsSuccess'] = true;

        return view($this->viewPath . 'reset_password', $data);
    }
}
