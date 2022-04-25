<?php

/**
 * Singleton
 */

require_once 'Routing/Router.php';

use Routing\Router;


// We call an instance of the Router.
$router = Router::getInstance();

$router->add('page1', 'page@get1');
$router->add('page2', 'page@get2');

// return array - It returns both routes.
echo '<pre>'; var_dump($router->getRoutes());


// We call the Router instance again (will return the same instance as the 1st Router instance call).
$router2 = Router::getInstance();
$router2->add('page3', 'page@get3');

// return array - It returns all 3 routes.
echo '<pre>'; var_dump($router->getRoutes());

// return array - It returns all 3 routes.
echo '<pre>'; var_dump($router2->getRoutes());
