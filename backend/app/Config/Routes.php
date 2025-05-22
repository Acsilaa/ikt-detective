<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Api;
/**
 * @var RouteCollection $routes
 */
$routes->match(['get', 'options'],'csrf', [Api::class, 'csrf']);
$routes->match(['post', 'options'], 'subjects', [Api::class, 'subjects']);
$routes->match(['post', 'options'], 'detectives', [Api::class, 'detectives']);
$routes->match(['post', 'options'], 'subjectpairs', [Api::class, 'subjectpairs']);
$routes->match(['post', 'options'], 'subject', [Api::class, 'subject']);
$routes->match(['post', 'options'], 'detective', [Api::class, 'detective']);
