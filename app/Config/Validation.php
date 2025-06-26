<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        // 'list'   => 'CodeIgniter\Validation\Views\list',
        // 'single' => 'CodeIgniter\Validation\Views\single',
        'list'        => 'errors' . DIRECTORY_SEPARATOR . '_my_list',
        'single'      => 'errors' . DIRECTORY_SEPARATOR . '_my_single',
        'single_full' => 'errors' . DIRECTORY_SEPARATOR . '_my_single_full',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public $registration = [
        'email' => [
            'label' => 'Auth.register.email',
            'rules' => [
                'required',
                'max_length[254]',
                'valid_email',
                'is_unique[users.username]',
                'is_unique[auth_identities.secret]',
            ],
        ],
        'first_name' => [
            'label' => 'Auth.register.firstName',
            'rules' => [
                'required',
                'max_length[100]',
                'string',
            ],
        ],
        'last_name' => [
            'label' => 'Auth.register.lastName',
            'rules' => [
                'required',
                'max_length[100]',
                'string',
            ],
        ],
        'country_code' => [
            'label' => 'Auth.register.country',
            'rules' => [
                'required',
            ],
        ],
        'password' => [
            'label' => 'Auth.register.password',
            'rules' => [
                'required',
                'max_byte[72]',
                'strong_password[]',
            ],
            'errors' => [
                'max_byte' => 'Auth.errorPasswordTooLongBytes',
            ],
        ],
        'password_confirm' => [
            'label' => 'Auth.register.passwordConfirm',
            'rules' => 'required|matches[password]',
        ],
    ];
    public $changePassword = [
        'password_old' => [
            'label' => 'Auth.password',
            'rules' => 'required|old_password',
        ],
        'password' => [
            'label' => 'Auth.password',
            'rules' => [
                'required',
                'max_byte[72]',
                'strong_password[]',
            ],
            'errors' => [
                'max_byte' => 'Auth.errorPasswordTooLongBytes',
            ],
        ],
        'password_confirm' => [
            'label' => 'Auth.passwordConfirm',
            'rules' => 'required|matches[password]',
        ],
    ];
    public $resetPassword = [
        'password' => [
            'label' => 'Auth.password',
            'rules' => [
                'required',
                'max_byte[72]',
                'strong_password[]',
            ],
            'errors' => [
                'max_byte' => 'Auth.errorPasswordTooLongBytes',
            ],
        ],
        'password_confirm' => [
            'label' => 'Auth.passwordConfirm',
            'rules' => 'required|matches[password]',
        ],
    ];
}
