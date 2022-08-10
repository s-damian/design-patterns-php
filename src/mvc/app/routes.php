<?php

use Core\Routing\Router;

/**
 * List of routes.
 */

$router = Router::getInstance();

$router->add('', 'Home@show');
$router->add('articles', 'Article@index');
