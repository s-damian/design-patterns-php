<?php

namespace Core\Foundation;

use Core\Contracts\Routing\RouterInterface;

/**
 * To create the app.
 */
class Application
{
    /**
     * @var RouterInterface
     */
    private RouterInterface $router;

    /**
     *  Application constructor.
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * Load the list of routes and run the Routing.
     */
    public function run(): void
    {
        $this->router->run();
    }
}
