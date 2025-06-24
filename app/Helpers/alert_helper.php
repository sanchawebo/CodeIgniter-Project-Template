<?php

/**
 * Stacks toasts in #alerts-wrapper.
 *
 * @param string $type A Bootstrap color-type (primary, danger, warning ...)
 */
function alert(string $type, string $message)
{
    return sprintf('<div hx-swap-oob="beforeend:#alerts-wrapper">
        <div _="on load wait 10 seconds then transition opacity to 0 then remove me" class="toast align-items-center text-bg-%s border-0 show mt-1" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    %s
                </div>
                <button class="btn-close btn-close-white me-2 m-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
                <div class="progress active"></div>
            </div>
        </div>
    </div>', $type, $message);
}

/**
 * Does not stack the toasts.
 *
 * @param string $type A Bootstrap color-type (primary, danger, warning ...)
 */
function alertSame(string $type, string $message)
{
    return sprintf('<div hx-swap-oob="innerHTML:#alerts-wrapper">
        <div _="on load wait 10 seconds then transition opacity to 0 then remove me" class="toast align-items-center text-bg-%s border-0 show mt-1 wobble-animation" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    %s
                </div>
                <button class="btn-close btn-close-white me-2 m-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
                <div class="progress active"></div>
            </div>
        </div>
    </div>', $type, $message);
}
