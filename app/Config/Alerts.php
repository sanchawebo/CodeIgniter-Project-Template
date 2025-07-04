<?php

namespace Tatter\Alerts\Config;

use CodeIgniter\Config\BaseConfig;

class Alerts extends BaseConfig
{
    /**
     * Template to use for HTML output.
     */
    public string $template = 'App\Views\components\alert';

    /**
     * Mapping of Session keys to their CSS classes.
     * Note: Some templates may add prefixes to the class,
     * like Bootstrap "alert-{$class}".
     *
     * @var array<string,string>
     */
    public array $classes = [
        // Bootstrap classes
        'primary'   => 'primary',
        'secondary' => 'secondary',
        'success'   => 'success',
        'danger'    => 'danger',
        'warning'   => 'warning',
        'info'      => 'info',

        // Additional log levels
        'message'   => 'info',
        'notice'    => 'info',
        'error'     => 'danger',
        'critical'  => 'danger',
        'emergency' => 'danger',
        'alert'     => 'warning',
        'debug'     => 'info',

        // Common framework keys
        'messages' => 'info',
        'errors'   => 'danger',
    ];
}
