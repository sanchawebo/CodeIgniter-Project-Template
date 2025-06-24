<?php

if (! function_exists('session_alert')) {
    /**
     * @param string $type Session key, gets mapped to a bootstrap color-type (primary, error=danger, warning ...)
     */
    function session_alert(string $type, string $class = 'alert', string $extraClasses = '', ?string $faIcon = null): string
    {
        if (session($type) === null) {
            return '';
        }
        $type = match ($type) {
            'success' => 'success',
            'error'   => 'danger',
            default   => $type,
        };
        $message = session($type);
        session()->remove($type);
        if ($faIcon) {
            $faIcon = '<i class="' . $faIcon . '"></i>';
            $extraClasses .= " {$type}-icon";
            $message = $faIcon . ' ' . $message;
        }

        return <<<HTML
            <div class="{$class} {$class}-{$type} {$extraClasses}"
                _="on load add .wobble-animation-light then settle then remove .wobble-animation-light then wait 10s then transition my opacity to 0 then remove me"
            >
                {$message}
            </div>
            HTML;
    }
}

if (! function_exists('model_error')) {
    /**
     * @param string $field The field name to check for errors
     */
    function model_error(?string $field, string $class = 'alert', string $extraClasses = 'mt-1 mb-0 py-1 px-2', ?string $faIcon = null): string
    {
        if ($field === null || $field === '') {
            return '';
        }
        $type = 'danger';

        return <<<HTML
            <div class="{$class} {$class}-{$type} {$extraClasses}">
                {$field}
            </div>
            HTML;
    }
}
