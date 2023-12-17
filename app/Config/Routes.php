<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');
$routes->get('/news/detail/(:num)', 'NewsController::detail/$1');
$routes->get('/news/by_category/(:num)', 'HomeController::newsByCategory/$1');
$routes->post('/search', 'HomeController::search');
$routes->get('/news/create', 'NewsController::create');
$routes->post('/news/create', 'NewsController::create');