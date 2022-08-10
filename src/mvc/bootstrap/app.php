<?php

use Core\Routing\Router;
use Core\Foundation\Application;

/**
 * Create the app.
 */

/**
 * Instantiate the Router.
 */
$router = Router::getInstance();

/**
 * Instantiate the app.
 */
$app = new Application($router);

/**
 * Return app.
 */
return $app;
