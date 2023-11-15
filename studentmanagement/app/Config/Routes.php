<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->group('User', ['filter' => 'Auth'], function ($routes) {
    $routes->get('/', 'UserController::index');
    $routes->match(['get', 'post'], 'enroll', 'UserController::EnrollStudent');
});

$routes->group('Admin', ['filter' => 'Auth'], function ($routes) {
    $routes->get('/', 'AdminController::index');
});

$routes->group('Student', ['filter' => 'Auth'], function ($routes) {
    $routes->get('/', 'StudentController::index');
});

$routes->get('/', 'Home::index', ['filter' => 'NoAuth']);
$routes->match(['get', 'post'], 'login', 'Home::login', ['filter' => 'NoAuth']);
$routes->get('/logout', 'Home::logout', ['filter' => 'Auth']);