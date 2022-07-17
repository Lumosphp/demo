<?php

use Lumos\Http\Request;
use Lumos\Kernel;

require dirname(__DIR__).'/vendor/autoload.php';

// Initialise kernel with config
$config = require dirname(__DIR__).'/app/config.php';
$kernel = new Kernel($config);

// Handle the request
$request = Request::createFromGlobals();
$response = $kernel->handle($request);

// Send the response and terminate
$response->send();
$kernel->terminate($request, $response);
