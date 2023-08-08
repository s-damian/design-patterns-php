<?php

namespace Core\Routing;

use Core\Contracts\Routing\RouterInterface;
use Core\Http\Input;
use Core\Http\Request;
use Core\Http\Response;
use Core\Exception\ExceptionHandler;

/**
 * Routing management.
 */
class Router implements RouterInterface
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
     * @var Router
     */
    private static $instance;

    /**
     *  Router constructor.
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
        $this->uri = ltrim(Request::getRequestUri(), '/');
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
            if ($this->uri === $path) {
                return $this->executeAction($action);
            }
        }

        return $this->executeError404();
    }

    /**
     * Execute action.
     *
     * @throws ExceptionHandler
     */
    private function executeAction(string $action): mixed
    {
        list($controller, $method) = explode('@', $action);

        $class = '\App\Controllers\\'.ucfirst($controller).'Controller';

        if (! class_exists($class)) {
            throw new ExceptionHandler('Class "'.$class.'" not found.');
        }

        $controllerInstantiate = new $class();

        if (! method_exists($controllerInstantiate, $method)) {
            throw new ExceptionHandler('Method "'.$method.'" not found in '.$class.'.');
        }

        return call_user_func_array([new $controllerInstantiate(), $method], []);
    }

    /**
     * Return a 404 error.
     */
    private function executeError404(): mixed
    {
        $error = new \App\Controllers\ErrorController();

        return $error->show404();
    }
}
