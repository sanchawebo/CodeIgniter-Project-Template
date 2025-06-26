<?php

namespace UserMgmt\Config;

class Registrar
{
    /**
     * Adds general settings to App config.
     */
    public static function App(): array
    {
        return [
            'dateFormat' => 'M j, Y',
            'timeFormat' => 'G:i',
        ];
    }

    /**
     * Adds the permissions needed by this module to Shield's auth groups config.
     */
    public static function AuthGroups(): array
    {
        return [
            'permissions' => [
                'users.list'          => 'Can view a list of users in the system',
                'users.manage-admins' => 'Can manage other admins',
                'users.view'          => 'Can view user details',
                'users.create'        => 'Can create new non-admin users',
                'users.edit'          => 'Can edit existing non-admin users',
                'users.settings'      => 'Can manage User settings in admin area',
                'users.delete'        => 'Can delete existing non-admin users',
                'me.edit'             => 'Can edit user\'s own settings',
                'me.security'         => 'Can change user\'s own password',
            ],
        ];
    }

    /**
     * Adds pager template to CI's pager config
     */
    public static function Pager(): array
    {
        return [
            'templates' => [
                'frok_full' => 'Mpr\UserMgmt\Views\pager\custom_full',
            ],
        ];
    }

    /**
     * Adds pager template to CI's pager config
     */
    public static function Validation(): array
    {
        return [
            'userMgmt_user' => [
                'id' => [
                    // Needed for the id in username test;
                    // see https://codeigniter4.github.io/userguide/installation/upgrade_435.html
                    'rules' => 'permit_empty|is_natural_no_zero',
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => [
                        'required',
                        'max_length[254]',
                        'valid_email',
                        'is_unique[auth_identities.secret,user_id,{id}]',
                    ],
                    'errors' => [
                        'is_unique' => 'This email is already in use. Could belong to a current or a deleted user.',
                    ],
                ],
                'username' => [
                    'label' => 'Users.username',
                    'rules' => 'permit_empty|string|is_unique[users.username,id,{id}]',
                ],
                'first_name' => [
                    'label' => 'Users.firstName',
                    'rules' => 'permit_empty|string|min_length[3]',
                ],
                'last_name' => [
                    'label' => 'Users.lastName',
                    'rules' => 'permit_empty|string|min_length[3]',
                ],
                'country_code' => [
                    'label' => 'Users.country',
                    'rules' => 'required|is_not_unique[countries.country_code]',
                ],
            ],
        ];
    }
}
