<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//View Home Index
$routes->get('/crud', 'UserController::homepage');

//Controller
$routes->get('/crud/(:any)', 'UserController::crud/$1');

//Insert
$routes->post('/insert', 'UserController::insert');

//Update
$routes->get('/edit/(:any)', 'UserController::edit/$1');

//Delete
$routes->get('/delete/(:any)', 'UserController::delete/$1');