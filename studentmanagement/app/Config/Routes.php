<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->group('User', ['filter' => 'Auth'], function ($routes) {
    $routes->get('/', 'UserController::index');
    $routes->match(['get', 'post'], 'enroll', 'UserController::EnrollStudent');
    $routes->match(['get', 'post'], 'announcement', 'UserController::Announcement');
});

$routes->group('Admin', ['filter' => 'Auth'], function ($routes) {
    $routes->get('/', 'AdminController::index');
});

$routes->group('Student', ['filter' => 'Auth'], function ($routes) {
    $routes->get('/', 'StudentController::index');
    $routes->get('announcement/(:segment)', 'StudentController::ViewAnnouncement/$1');
    $routes->get('announcements', 'StudentController::ShowAnnouncement');
});

$routes->get('/', 'Home::index', ['filter' => 'NoAuth']);
$routes->match(['get', 'post'], 'login', 'Home::login', ['filter' => 'NoAuth']);
$routes->get('/logout', 'Home::logout', ['filter' => 'Auth']);