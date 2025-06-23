<?php

if (! function_exists('htmx_indicator')) {
    /**
     * Use this to show the user that waiting for a process to finish is needed.
     *
     * @param int|null    $size    Integer in rem.
     * @param string|null $classes optional css-classlist-string
     */
    function htmx_indicator(?int $size = null, string $color = 'primary', ?string $classes = ''): string
    {
        $color = 'text-' . $color;
        $size  = ($size) ? 'style="width:' . $size . 'rem ; height: ' . $size . 'rem"' : '';

        return <<<HTML
            <div class="d-flex justify-content-center py-3 htmx-indicator {$classes}">
                <div class="spinner-border {$color}" {$size} role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            HTML;
    }
}

/**
 * Gives an out-of-bounds-swap-string containing a csrf field to use in forms.
 */
function htmx_oob_csrf(): string
{
    return sprintf('<div hx-swap-oob="true:[name=\'%s\']">
            %s
        </div>', csrf_token(), csrf_field());
}

/**
 * @param string $type A Bootstrap color-type (primary, danger, warning ...)
 */
function htmx_oob_alert(string $type, string $message): string
{
    $textColor = match ($type) {
        'primary',
        'secondary',
        'success',
        'danger',
        'dark',
        'black' => 'white',
        'warning',
        'info',
        'light',
        'white'            => 'dark',
        'primary-subtle'   => 'primary-emphasis',
        'secondary-subtle' => 'secondary-emphasis',
        'success-subtle'   => 'success-emphasis',
        'danger-subtle'    => 'danger-emphasis',
        'warning-subtle'   => 'warning-emphasis',
        'info-subtle'      => 'info-emphasis',
        'light-subtle'     => 'light-emphasis',
        'dark-subtle'      => 'dark-emphasis',
        default            => 'body',
    };

    return sprintf('<div hx-swap-oob="beforeend:#alerts-wrapper">
        <div _="on load wait 10 seconds then transition opacity to 0 then remove me" class="toast align-items-center bg-%s text-%s border-0 show mt-1" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    %s
                </div>
                <button class="btn-close btn-close-white me-2 m-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
                <div class="progress active"></div>
            </div>
        </div>
    </div>', $type, $textColor, $message);
}
