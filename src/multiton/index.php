<?php

/**
 * Multiton
 */

require_once 'Routing/Router.php';

use Routing\Router;


// On appelle une instance du Router
$router = Router::getInstance('instance_web');

$router->add('page1', 'page@get1');
$router->add('page2', 'page@get2');

// return array - Retourne bien les 2 routes
var_dump($router->getRoutes());


// On appelle de nouveau l'instance du Router (retournera la même instance que le 1ère appelle d'instance du Router)
$router2 = Router::getInstance('instance_web');
$router2->add('page3', 'page@get3');

// return array - Retourne bien les 3 routes
var_dump($router->getRoutes());

// return array - Retourne bien les 3 routes
var_dump($router2->getRoutes());


// On appelle une nouvelle instance du Router (retournera une nouvelle instance)
$router3 = Router::getInstance('instance_api');
$router3->add('page3', 'page@get3');

// return array - Retourne bien que les 3 routes de 'instance_web'. La route de 'instance_api' n'a donc pas été prise en compte
var_dump($router->getRoutes());

// return array - Retourne bien qu'une seule router (la route de 'instance_api')
var_dump($router3->getRoutes());
