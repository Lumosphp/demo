<?php

namespace App\Middleware;

use Lumos\DependencyInjection\ContainerAwareInterface;
use Lumos\DependencyInjection\Traits\ContainerAware;
use Lumos\Http\RedirectResponse;
use Lumos\Http\Request;

class AuthMiddleware implements ContainerAwareInterface
{
    use ContainerAware;

    public function __construct(
        protected string $loginRoute
    ) {}

    public function handleRequest(Request $request)
    {
        if (!$request->attributes->has('user')) {
            return new RedirectResponse(
                $this->container->get('routes')->get($this->loginRoute)->getPath()
            );
        }
    }
}
