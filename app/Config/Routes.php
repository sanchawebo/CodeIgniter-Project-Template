<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// @phpstan-ignore codeigniter.unknownServiceMethod
// @phpstan-ignore method.nonObject
service('auth')->routes($routes);
