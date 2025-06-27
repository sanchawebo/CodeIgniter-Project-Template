<?php

namespace UserMgmt;

use CodeIgniter\Router\RouteCollection;
use UserMgmt\Controllers\UserController;

/**
 * @var RouteCollection $routes
 */
$routes->group(ADMIN_AREA . '/users', ['namespace' => 'UserMgmt\Controllers', 'filter' => 'permission:users.list'], static function ($routes) {
    // Manage Users
    $routes->get('new', [UserController::class, 'create'], ['as' => 'user-new']);
    $routes->get('(:num)', [UserController::class, 'edit'], ['as' => 'user-edit']);
    $routes->get('(:num)/delete', [UserController::class, 'delete'], ['as' => 'user-delete']);
    $routes->post('(:num)/save', [UserController::class, 'save'], ['as' => 'user-save']);
    $routes->post('(:num)/changePassword', [UserController::class, 'changePassword'], ['as' => 'user-pass-change']);
    $routes->post('save', [UserController::class, 'save']);
    $routes->get('(:num)/security', [UserController::class, 'security']);
    $routes->get('(:num)/permissions', [UserController::class, 'permissions']);
    $routes->post('(:num)/permissions', [UserController::class, 'savePermissions']);
    $routes->post('delete-batch', [UserController::class, 'deleteBatch']);
    $routes->post('search', [UserController::class, 'search'], ['as' => 'user-search']);
    $routes->match(['GET', 'POST'], '/', [UserController::class, 'list'], ['as' => 'user-list']);
});
