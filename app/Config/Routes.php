<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Root route
$routes->get('/', 'HomeController::index');

// Auth routes
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');
$routes->get('create-test-user', 'Auth::createTestUser');
$routes->get('recommendation/login', 'RecommendationController::login');
$routes->post('recommendation/login', 'RecommendationController::attemptLogin'); 
$routes->get('recommendation/logout', 'RecommendationController::logout');

// Recommendation System Routes
$routes->group('recommendation', function($routes) {
    $routes->get('/', 'RecommendationController::index');
    $routes->get('login', 'RecommendationController::login');
    $routes->post('login', 'RecommendationController::attemptLogin');
    $routes->post('save-preferences', 'RecommendationController::savePreferences');
    $routes->post('update-preference', 'RecommendationController::updatePreference');
    $routes->get('dashboard/(:segment)', 'RecommendationController::dashboard/$1');
    $routes->get('destination/(:num)', 'RecommendationController::destination/$1');
    $routes->get('logout', 'RecommendationController::logout');
});

// Transportation Management Routes
$routes->group('transportation', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Tourism::index');
    $routes->get('filterRoutes', 'Tourism::filterRoutes');
    $routes->get('route/(:num)', 'Tourism::route/$1');
    $routes->get('schedule/(:num)', 'Tourism::schedule/$1');
    $routes->get('destination/(:num)', 'Tourism::destination/$1');
    $routes->get('statistics', 'Transportation::statistics');
});