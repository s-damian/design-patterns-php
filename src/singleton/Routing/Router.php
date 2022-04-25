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
     *
     * @var string
     */
    private string $uri = '';

    /**
     * Routes
     *
     * @var array
     */
    private array$routes = [];

    /**
     * Router constructor.
     *
     * We put it in private so that we cannot instantiate the router other than with a singleton.
     */
    private function __construct()
    {
        $this->setUri();
    }

    /**
     * Singleton.
     *
     * @return Router
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
    private function setUri()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    /**
     * Add a route.
     *
     * @param string $path
     * @param string $action
     */
    public function add(string $path, string $action)
    {
        $this->routes[$path] = $action;
    }

    /**
     * Execute Routing.
     *
     * @return mixed
     */
    public function run()
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
     * @param string $action
     * @throws Exception
     * @return mixed
     */
    private function executeAction(string $action)
    {
        list($controller, $method) = explode('@', $action);

        $class = '\App\Controllers\\'.ucfirst($controller).'Controller';

        if (!class_exists($class)) {
            throw new Exception('Class "'.$class.'" not found.');
        }

        $controllerInstantiate = new $class();

        if (!method_exists($controllerInstantiate, $method)) {
            throw new Exception('Method "'.$method.'" not found in '.$class.'.');
        }

        return call_user_func_array([new $controllerInstantiate, $method], []);
    }

    /**
     * Return a 404 error.
     *
     * @return mixed
     */
    private function executeError404()
    {
        die('404 Error');
    }

    /**
     * Return all routes.
     *
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}
