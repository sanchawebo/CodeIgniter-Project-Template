<?php

return [
    'login' => [
        'title'          => SITE_NAME,
        'email'          => 'E-Mail address',
        'password'       => 'Password',
        'passwordBtn'    => 'Show/Hide Password',
        'loginBtn'       => 'Login',
        'rememberMe'     => 'Remember me?',
        'forgotPassword' => 'Forgot Password',
        'register'       => 'Register',
    ],
    'magicLink' => [
        'title'   => 'Password Help',
        'text'    => 'If you have forgotten your password, enter your login e-mail address in the text field below. A link with which you can log in to reset your password will then be sent to this address.',
        'email'   => 'E-Mail address',
        'sendBtn' => 'Send',
        'back'    => 'Back to Login',
    ],
    'register' => [
        'title'            => 'Register your Account',
        'text'             => 'Please populate the mandatory fields below. With a click on the \'Register\' button, you agree that your personal data will be processed. Please note: users who have not logged in for more than 12 months will be deleted and will have to register again.',
        'email'            => 'Your E-Mail address',
        'boschEmail'       => 'E-Mail of your Bosch contact person',
        'dealerId'         => 'Dealer ID',
        'firstName'        => 'First Name',
        'lastName'         => 'Last Name',
        'country'          => 'Country',
        'password'         => 'Password',
        'passwordHelp'     => 'Password needs to contain the following:',
        'passwordBtn'      => 'Show/Hide Password',
        'passwordCriteria' => [
            'chars'      => 'At least',
            'charsBold'  => '8 characters',
            'upper'      => 'One',
            'upperBold'  => 'uppercase letter',
            'lower'      => 'One',
            'lowerBold'  => 'lowercase letter',
            'number'     => 'One',
            'numberBold' => 'number',
            'match'      => 'Passwords need to match',
        ],
        'passwordConfirm' => 'Confirm Password',
        'registerBtn'     => 'Register',
        'back'            => 'Back to Login',
    ],
    'emailActivate' => [
        'title'        => 'Account Activation',
        'body'         => 'An admin has to authorise your account before you can use this site. You will be notified via this email-address:',
        'emailSubject' => SITE_NAME . ': Account Activation Request',
        'emailBody'    => 'A newly registered user awaits account activation.',
        'emailLink'    => 'Activate the account here:',
    ],
    'emailActivated' => [
        'emailSubject' => SITE_NAME . ': Account Activation Successful',
        'emailBody'    => 'Your ' . SITE_NAME . ' user account was authorised. You can now login to the site using the link below.',
        'emailLink'    => 'Link:',
    ],
    'resetPassword' => [
        'title'        => 'Reset Password',
        'notification' => 'Set a new password for your account here.',
    ],
];
