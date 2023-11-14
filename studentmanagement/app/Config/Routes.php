<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('User', function ($routes) {
    $routes->get('/', 'UserController::index');
});
