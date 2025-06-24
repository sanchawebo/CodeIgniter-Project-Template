<?php

namespace App\Controllers;

use CodeIgniter\Shield\Exceptions\RuntimeException;
use CodeIgniter\Shield\Models\UserIdentityModel;
use Config\Services;

class UserController extends BaseController
{
    private string $type = 'admin_activate';

    // ! GET
    public function activateShow()
    {
        $users           = auth()->getProvider();
        $userTable       = setting('Auth.tables')['users'];
        $identitiesTable = setting('Auth.tables')['identities'];

        $pendingUsers = $users
            ->select("{$userTable}.id AS id, {$identitiesTable}.secret AS secret")
            ->join(
                $identitiesTable,
                sprintf('%1$s.user_id = %2$s.id', $identitiesTable, $userTable),
                'inner',
            )
            ->where('type', 'email_password')
            ->where('active', 0)
            ->asArray()
            ->findAll();

        $data = [
            'pendingUsers' => $pendingUsers,
        ];

        return $this->returnFragment('admin/auth/activate', $data);
    }

    // ! POST
    public function activateHandle()
    {
        if (! $this->validate([
            'id'    => 'required|numeric',
            'email' => 'required|valid_email',
        ])) {
            return redirect()->back()->withInput();
        }

        $userModel = auth()->getProvider();
        $userEmail = $this->validator->getValidated()['email'];

        $user = $userModel->findByCredentials(['email' => $userEmail]);

        // Activate user
        $user->activate();
        // Delete the special identity
        model(UserIdentityModel::class)->deleteIdentitiesByType($user, $this->type);

        // Send the email
        $email = Services::email();

        $email->setMailType('html');
        $email->setFrom(setting('Email.fromEmail'), setting('Email.fromName') ?? '');
        $email->setTo($userEmail);
        $email->setSubject(lang('Auth.emailActivated.emailSubject'));
        $email->setMessage(view(
            setting('Auth.views')['action_email_activated_email'],
        ));

        if ($email->send(false) === false) {
            throw new RuntimeException('Cannot send email for user: ' . $userEmail . "\n" . $email->printDebugger(['headers']));
        }

        // Clear the email
        $email->clear();

        return redirect()->back()->with('actionActivateSuccess', lang('Admin.usersActivate.actionActivateSuccess'));
    }

    // ! POST
    public function deleteHandle()
    {
        if (! $this->validate([
            'id' => 'required|numeric',
        ])) {
            return redirect()->back()->withInput();
        }

        $userModel = auth()->getProvider();
        $id        = $this->validator->getValidated()['id'];

        $user = $userModel->findById($id);

        // Delete user
        if ($userModel->delete($user->id)) {
            return redirect()->back()->with('actionDeleteSuccess', lang('Admin.usersActivate.actionDeleteSuccess'));
        }

        return redirect()->back()->with('error', lang('Admin.usersActivate.actionFailed'));
    }
}
