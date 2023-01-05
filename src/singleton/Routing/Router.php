<?php

namespace Routing;

use Exception;

/**
 * Routing management.
 */
final class Router
{
    /**
     * @var Router
     */
    private static $instance;

    /**
     * URI.
     */
    private string $uri = '';

    /**
     * Routes.
     */
    private array $routes = [];

    /**
     * We put it in private so that we cannot instantiate the router other than with a singleton.
     */
    private function __construct()
    {
        $this->setUri();
    }

    /**
     * Singleton.
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * URI setter.
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
     * Execute Routing.
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
     * Execute action.
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
