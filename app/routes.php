<?php

use App\Controllers\WelcomeController;
use Lumos\Http\Routing\Route;
use Lumos\Http\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add(
    'index',
    Route::create('/', [WelcomeController::class, 'index'], ['GET'])
);

$routes->add(
    'greet',
    Route::create('/greet/{name}', [WelcomeController::class, 'greet'])
);

return $routes;
