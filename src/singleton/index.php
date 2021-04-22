<?php

/**
 * Singleton
 */

require_once 'Routing/Router.php';

use Routing\Router;


// On appelle une instance du Router
$router = Router::getInstance();

$router->add('page1', 'page@get1');
$router->add('page2', 'page@get2');

// return array - Retourne bien les 2 routes
var_dump($router->getRoutes());


// On appelle de nouveau l'instance du Router (retournera la même instance que le 1ère appelle d'instance du Router)
$router2 = Router::getInstance();
$router2->add('page3', 'page@get3');

// return array - Retourne bien les 3 routes
var_dump($router->getRoutes());

// return array - Retourne bien les 3 routes
var_dump($router2->getRoutes());
