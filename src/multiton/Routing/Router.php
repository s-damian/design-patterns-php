<?php

namespace Routing;

use Exception;

/**
 * Routing management.
 */
final class Router
{
    /**
     * URI.
     */
    private string $uri = '';

    /**
     * Routes.
     */
    private array $routes = [];

    /**
     * @var array - The different instances of the Router.
     */
    private static array $instances = [];

    /**
     * We put it in private so that we can't instantiate the router other than with a Multiton.
     */
    private function __construct()
    {
        $this->setUri();
    }

    /**
     * Multiton.
     */
    public static function getInstance(string $key): self
    {
        if (! isset(self::$instances[$key])) {
            self::$instances[$key] = new self();
        }

        return self::$instances[$key];
    }

    /**
     * Setter of the URI.
     */
    private function setUri(): void
    {
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    /**
     * Add a route.
     */
    public function add(string $path, string $action): void
    {
        $this->routes[$path] = $action;
    }

    /**
     * Execute the Routing.
     */
    public function run(): mixed
    {
        foreach ($this->routes as $path => $action) {
            if ($this->uri == $path) {
                return $this->executeAction($action);
            }
        }

        return $this->executeError404();
    }

    /**
     * Execute the action.
     *
     * @throws Exception
     */
    private function executeAction(string $action): mixed
    {
        list($controller, $method) = explode('@', $action);

        $class = '\App\Controllers\\'.ucfirst($controller).'Controller';

        if (! class_exists($class)) {
            throw new Exception('Class "'.$class.'" not found.');
        }

        $controllerInstantiate = new $class();

        if (! method_exists($controllerInstantiate, $method)) {
            throw new Exception('Method "'.$method.'" not found in '.$class.'.');
        }

        return call_user_func_array([new $controllerInstantiate(), $method], []);
    }

    /**
     * Return a 404 error.
     *
     * @return mixed
     */
    private function executeError404(): never
    {
        die('404 Error');
    }

    /**
     * Return all routes.
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}
