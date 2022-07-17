<?php

namespace App\Controllers;

use Lumos\Http\Controller;
use Lumos\Http\Response;
use Lumos\Templating\PhpEngine;

abstract class BaseController extends Controller
{
    /**
     * Initialise with the templating engine.
     */
    public function __construct(
        protected PhpEngine $templating
    ) {}

    /**
     * Render view and return response object.
     */
    protected function render(string $view, array $parameters = []): Response
    {
        return $this->respond(
            $this->templating->render($view, $parameters)
        );
    }
}
