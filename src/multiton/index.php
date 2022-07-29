<?php

/**
 * Multiton.
 */

require_once 'Routing/Router.php';

use Routing\Router;


// We call an instance of the Router.
$router = Router::getInstance('instance_web');

$router->add('page1', 'page@get1');
$router->add('page2', 'page@get2');

// return array - Returns 2 routes well.
echo '<pre>'; var_dump($router->getRoutes());


// The Router instance is called again (will return the same instance as the 1st Router instance call).
$router2 = Router::getInstance('instance_web');
$router2->add('page3', 'page@get3');

// return array -Returns the 3 routes well.
echo '<pre>'; var_dump($router->getRoutes());

// return array -Returns the 3 routes well.
echo '<pre>'; var_dump($router2->getRoutes());


// A new instance of the Router is called (will return a new instance).
$router3 = Router::getInstance('instance_api');
$router3->add('page3', 'page@get3');

// return array - Returns only the 3 routes of 'instance_web'. The 'instance_api' route was therefore not taken into account.
echo '<pre>'; var_dump($router->getRoutes());

// return array - Returns only one router (the 'instance_api' route).
echo '<pre>'; var_dump($router3->getRoutes());
