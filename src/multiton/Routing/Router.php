<?php

namespace Routing;

use Exception;

/**
 * Gestion du Routing.
 */
final class Router
{
    /**
     * @var array - Les différentes instances du Router.
     */
    private static array $instances = [];

    /**
     * URI.
     *
     * @var string
     */
    private string $uri = '';

    /**
     * Les Routes.
     *
     * @var array
     */
    private array $routes = [];

    /**
     * Router constructor.
     *
     * On le met en private pour qu'on ne puis pas instancier le router autrement qu'avec un Multiton.
     */
    private function __construct()
    {
        $this->setUri();
    }

    /**
     * Multiton.
     *
     * @param string $key
     * @return Router
     */
    public static function getInstance(string $key): self
    {
        if (!isset(self::$instances[$key])) {
            self::$instances[$key] = new self();
        }

        return self::$instances[$key];
    }

    /**
     * Setter de l'URI.
     */
    private function setUri()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    /**
     * Ajouter une route.
     *
     * @param string $path
     * @param string $action
     */
    public function add(string $path, string $action)
    {
        $this->routes[$path] = $action;
    }

    /**
     * Executer le Routing.
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
     * Executer l'action.
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
     * Retourner une erreur 404.
     *
     * @return mixed
     */
    private function executeError404()
    {
        die('404 Error');
    }

    /**
     * Retourner toute les routes.
     *
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}
