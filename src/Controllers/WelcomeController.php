<?php

namespace App\Controllers;

use Lumos\Http\Response;

class WelcomeController extends BaseController
{
    public function index(): Response
    {
        return $this->render('welcome.phtml');
    }

    /**
     * Greet the user.
     *
     * The routes `{name}` parameter is available to the action.
     */
    public function greet($name): Response
    {
        return $this->respond("Welcome {$name}!");
    }
}
