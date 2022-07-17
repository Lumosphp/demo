<?php

use Lumos\Config;
use Lumos\Templating\PhpEngine;

// Best practice would be to read these values from environment variables.
$config = new Config(
    debug: true,
    routes: require('routes.php'),
);

// Define services to be initialised and added to the container.
$config->set('services', [
    'templating' => [
        'class' => PhpEngine::class,
        'parameters' => [
            'directories' => [
                dirname(__DIR__).'/app/views',
            ],
        ],
    ],
]);

return $config;
