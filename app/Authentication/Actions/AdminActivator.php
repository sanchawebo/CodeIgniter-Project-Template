<?php

declare(strict_types=1);

namespace Authentication\Actions;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;
use CodeIgniter\I18n\Time;
use CodeIgniter\Shield\Authentication\Actions\ActionInterface;
use CodeIgniter\Shield\Authentication\Authenticators\Session;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Exceptions\LogicException;
use CodeIgniter\Shield\Exceptions\RuntimeException;
use CodeIgniter\Shield\Traits\Viewable;

class AdminActivator implements ActionInterface
{
    use Viewable;

    private string $type = 'admin_activate';

    /**
     * Shows the initial screen to the user telling them
     * that an admin needs to authorise their registration request.
     */
    public function show(): Response|string
    {
        /** @var Session $authenticator */
        $authenticator = auth('session')->getAuthenticator();
        /** @var IncomingRequest $request */
        $request = service('request');

        $user = $authenticator->getPendingUser();
        if ($user === null) {
            throw new RuntimeException('Cannot get the pending login User.');
        }

        if ($user->isActivated()) {
            // Success!
            // Delete session var to prevent auto-login and infinite redirect loop ;)
            session()->remove('user');

            return redirect()->to(config('Auth')->registerRedirect())
                ->with('message', lang('Auth.registerSuccess'));
        }

        // Only send a new email after 24 hours.
        if (! $this->replaceIdentity($user)) {
            return $this->view(setting('Auth.views')['action_email_activate_show'], ['user' => $user]);
        }

        $userEmail = $user->email;
        if ($userEmail === null) {
            throw new LogicException(
                'Email Activation needs user email address. user_id: ' . $user->id
            );
        }

        $date = Time::now(setting('App.appTimezone'))->toDateTimeString();

        $users = auth()->getProvider();

        // Get Admin emails
        // TODO Probably extract this to its own db-table for easier access.
        $adminEmails = $users
            ->join(
                setting('Auth.tables')['groups_users'],
                sprintf('%1$s.user_id = %2$s.id', setting('Auth.tables')['groups_users'], setting('Auth.tables')['users']),
                'inner'
            )
            ->join(
                setting('Auth.tables')['identities'],
                sprintf('%1$s.user_id = %2$s.id', setting('Auth.tables')['identities'], setting('Auth.tables')['users']),
                'inner'
            )
            ->where(setting('Auth.tables')['identities'] . '.type', 'email_password')
            ->groupStart()
            ->where(setting('Auth.tables')['groups_users'] . '.group', 'superadmin')
            ->orWhere(setting('Auth.tables')['groups_users'] . '.group', 'admin-bosch')
            ->groupEnd()
            ->asArray()
            ->findColumn('secret');

        // Send the email
        $email = \Config\Services::email();

        $email->setMailType('html');
        $email->setFrom(setting('Email.fromEmail'), setting('Email.fromName') ?? '');
        $email->setTo($adminEmails);
        $email->setSubject(lang('ScpAuth.emailActivate.emailSubject'));
        $email->setMessage($this->view(
            setting('Auth.views')['action_email_activate_email'],
            ['userEmail' => $userEmail, 'date' => $date],
            ['debug'     => false]
        ));

        if ($email->send(false) === false) {
            throw new RuntimeException('Cannot send email for user: ' . $user->email . "\n" . $email->printDebugger(['headers']));
        }

        // Clear the email
        $email->clear();

        // Display the info page
        return $this->view(setting('Auth.views')['action_email_activate_show'], ['user' => $user]);
    }

    /**
     * Processes the form that was displayed in the previous form.
     *
     * @return Response|string
     */
    public function handle(IncomingRequest $request)
    {
        throw new PageNotFoundException();
    }

    /**
     * This handles the response after the user takes action
     * in response to the show/handle flow. This might be
     * from clicking the 'confirm my email' action or
     * following entering a code sent in an SMS.
     *
     * @return Response|string
     */
    public function verify(IncomingRequest $request)
    {
        throw new PageNotFoundException();
    }

    /**
     * Creates an identity for the action of the user.
     *
     * @return string random_string()|"null"
     */
    public function createIdentity(User $user): string
    {
        $identityModel = new \CodeIgniter\Shield\Models\UserIdentityModel();

        // Delete any previous identities for action
        $identityModel->deleteIdentitiesByType($user, $this->type);

        $generator = static fn (): string => random_string('nozero', 6);

        return $identityModel->createCodeIdentity(
            $user,
            [
                'type'  => $this->type,
                'name'  => 'register',
                'extra' => 'Admin needs to activate this account.',
            ],
            $generator
        );
    }

    /**
     * Replaces(or not) the identity for email rate limit.
     *
     * @return bool true on replace (send email). false otherwise.
     */
    private function replaceIdentity(User $user): bool
    {
        $identityModel = new \CodeIgniter\Shield\Models\UserIdentityModel();

        $ident = $identityModel->getIdentityByType($user, $this->type);

        // Get ident
        //

        if ($ident !== null) {
            $now = Time::now(setting('App.appTimezone'));
            if (! isset($ident->expires)) {
                $difference = -1;
            } else {
                $expireTime = $ident->expires;
                $expireTime = ($expireTime instanceof Time) ? $expireTime : Time::parse($expireTime, setting('App.appTimezone'));
                // Only create a new identity (and then send a new email) after 24 hours.
                $difference = $now->difference($expireTime)->getSeconds();
            }
            if ($difference > -1) {
                return false;
            }
            // Delete any previous identities for action
            $identityModel->deleteIdentitiesByType($user, $this->type);
        }

        $generator = static fn (): string => random_string('nozero', 6);

        $identityModel->createCodeIdentity(
            $user,
            [
                'type'    => $this->type,
                'name'    => 'register',
                'expires' => Time::now(setting('App.appTimezone'))->addHours(24),
                'extra'   => 'Admin needs to activate this account.',
            ],
            $generator
        );

        return true;
    }

    /**
     * Returns the string type of the action class.
     */
    public function getType(): string
    {
        return $this->type;
    }
}
