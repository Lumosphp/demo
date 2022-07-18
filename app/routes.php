<?php

use App\Controllers\AuthController;
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

$routes->add(
    'login',
    Route::create('/login', [AuthController::class, 'login'], 'GET')
);

$routes->add(
    'createSession',
    Route::create('/login', [AuthController::class, 'createSession'], 'POST')
);

$routes->add(
    'authenticated',
    Route::create('/authenticated', [AuthController::class, 'greet'])->addMiddleware('auth')
);

return $routes;
