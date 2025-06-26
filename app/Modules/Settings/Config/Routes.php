<?php

/**
 * @var RouteCollection $routes
 */

use CodeIgniter\Router\RouteCollection;
use Settings\Controllers\GeneralSettingsController;

$routes->group(ADMIN_AREA . '/settings', ['namespace' => 'UserMgmt\Controllers', 'filter' => 'permission:admin.settings'], static function ($routes) {
    $routes->get('general', [GeneralSettingsController::class, 'general'], ['as' => 'general-settings']);
    $routes->post('general', [GeneralSettingsController::class, 'saveGeneral']);

    $routes->get('timezones', [GeneralSettingsController::class, '::getTimezones']);
});
