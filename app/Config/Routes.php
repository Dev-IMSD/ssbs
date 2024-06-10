<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');  
$routes->get('/pdf/(:num)', 'PdfController::generatePdf/$1'); 
$routes->get('/users', 'UserController::showUsers');
$routes->get('/user-by-rut/(:segment)', 'UserController::showUserByRut/$1');