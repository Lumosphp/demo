<?php

namespace App\Services;

use Lumos\DependencyInjection\ContainerAwareInterface;
use Lumos\DependencyInjection\ServiceInterface;
use Lumos\DependencyInjection\Traits\ContainerAware;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * This is very basic example of an authentication service that listens to kernel events,
 * gets the user from the request and adds them to the request attributes.
 */
class AuthService implements ServiceInterface, ContainerAwareInterface
{
    use ContainerAware;

    protected EventDispatcherInterface $eventDispatcher;

    public function build(): void
    {
        $this->eventDispatcher = $this->container->get('eventDispatcher');

        $this->eventDispatcher->addListener(KernelEvents::REQUEST, $this->onKernelRequest(...), -100);
    }

    protected function onKernelRequest(RequestEvent $event)
    {
        $request = $event->getRequest();

        // Get name from cookie and add it to the request
        if ($request->cookies->has('user')) {
            // ... some code here to fetch user from the database/other storage...

            $request->attributes->set('user', $request->cookies->get('user'));
        }
    }
}
