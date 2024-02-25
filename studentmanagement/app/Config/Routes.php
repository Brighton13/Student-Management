<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->group('User', ['filter' => 'Auth'], function ($routes) {
    $routes->get('/', 'UserController::index');
    
    $routes->match(['get', 'post'], 'announcement', 'UserController::Announcement');
    $routes->get('results', 'UserController::viewClasspupils');
    $routes->get('results/(:segment)', 'UserController::EnterResults/$1');
    $routes->post('EnterResults', 'UserController::EnterRResults');

});

$routes->group('Admin', ['filter' => 'Auth'], function ($routes) {
    $routes->get('/', 'AdminController::index');
    $routes->match(['get', 'post'], 'hire', 'AdminController::HireTeacher');
    $routes->get('Teachers', 'AdminController::GetAllTeachers');
    $routes->match(['get', 'post'], 'AllStudents', 'AdminController::AllStudents');
    $routes->match(['get', 'post'], 'enroll', 'AdminController::EnrollStudent');
    $routes->get('announcement/(:segment)', 'AdminController::ViewAnnouncement/$1');
    $routes->match(['get', 'post'], 'announcement', 'AdminController::Announcement');
    $routes->post('classes/(:num)', 'AdminController::classAlloc/$1');
    $routes->get('classes', 'AdminController::allocation');
    $routes->get('subjects', 'AdminController::Subjects');
    $routes->match(['get', 'post'], 'create', 'AdminController::AddSubject');

});

$routes->group('Student', ['filter' => 'Auth'], function ($routes) {
    $routes->get('/', 'StudentController::index');
    $routes->get('announcement/(:segment)', 'StudentController::ViewAnnouncement/$1');
    $routes->get('announcements', 'StudentController::ShowAnnouncement');
});

$routes->get('/', 'Home::index', ['filter' => 'NoAuth']);

$routes->match(['get', 'post'], 'login', 'Home::login', ['filter' => 'NoAuth']);

$routes->get('logout', 'Home::logout', ['filter' => 'Auth']);