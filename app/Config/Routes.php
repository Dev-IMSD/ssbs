<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');  
$routes->get('/pdf/(:num)', 'PdfController::generatePdf/$1'); 
$routes->get('/users', 'UserController::showUsers');
$routes->get('/user-by-rut/(:segment)', 'UserController::showUserByRut/$1');

$routes->get('/login', 'LoginController::index');
$routes->post('/autentificar', 'LoginController::autentificar');
$routes->get('/cambioClave', 'LoginController::cambioClave');
$routes->post('/actualizacionClave', 'LoginController::actualizacionClave');



$routes->get('/sesion', 'UserController::sesion');
$routes->post('/autenticar', 'UserController::autenticar');
$routes->get('/cambioClave', 'UserController::cambioClave');



