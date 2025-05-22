<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Api;
/**
 * @var RouteCollection $routes
 */
$routes->match(['get', 'options'],'csrf', [Api::class, 'csrf']);
$routes->post('/subject', [Api::class, 'subject']);
