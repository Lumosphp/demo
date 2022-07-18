<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Lumos\Http\RedirectResponse;
use Lumos\Http\Request;
use Lumos\Http\Response;
use Symfony\Component\HttpFoundation\Cookie;

class AuthController extends BaseController
{
    public function login(): Response
    {
        return $this->render('login.phtml');
    }

    public function createSession(Request $request): RedirectResponse
    {
        if (!$request->get('name', false)) {
            return new RedirectResponse('/login');
        }

        $response = new RedirectResponse('/authenticated');
        $response->headers->setCookie(
            new Cookie('user', $request->get('name'))
        );

        return $response;
    }

    public function greet(Request $request)
    {
        $name = $request->attributes->get('user');
        return $this->respond("Hello {$name} from AuthController!");
    }
}
