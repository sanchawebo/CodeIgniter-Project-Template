<?php

namespace Mpr\Settings\Config;

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
                'admin.settings' => 'Can view and edit site settings',
            ],
        ];
    }
}
