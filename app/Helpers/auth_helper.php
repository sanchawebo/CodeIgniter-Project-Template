<?php

if (! function_exists('anchorWithPermission')) {
    function anchorWithPermission(
        string $routeTo,
        string $title,
        string $permission,
        string $cssClasses = 'list-group-item',
    ): string {
        $routeTo = route_to($routeTo);

        if (auth()->user()->can($permission)) {
            return <<< HTML
                <a href="{$routeTo}" class="{$cssClasses}">{$title}</a>
                HTML;
        }

        return '';
    }
}
