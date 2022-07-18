<?php

use App\Middleware\AuthMiddleware;
use App\Services\AuthService;
use Lumos\Config;
use Lumos\Templating\PhpEngine;

// Best practice would be to read these values from environment variables.
$config = new Config(
    debug: true,
    routes: require('routes.php'),
    middleware: require('middleware.php'),
);

// Define services to be initialised and added to the container.
$config->setServices([
    'templating' => [
        'class' => PhpEngine::class,
        'parameters' => [
            'directories' => [
                dirname(__DIR__).'/app/views',
            ],
        ],
    ],
    'authService' => [
        'class' => AuthService::class,
    ],
    'authMiddleware' => [
        'class' => AuthMiddleware::class,
        'parameters' => [
            'loginRoute' => 'login'
        ],
    ],
]);

return $config;
