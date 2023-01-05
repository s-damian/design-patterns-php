<?php

/**
 * Facory.
 */

require_once 'Cars/CarFactory.php';
require_once 'Cars/Models/Peugeot.php';
require_once 'Cars/Models/Renault.php';

use Cars\CarFactory;

/**
 * In this example,
 * Thanks to the "create" method of the "\Cars\CarFactory" class, we can instantiate the Models of "Cars".
 */

$peugeot = CarFactory::create('peugeot');
// return string - Name of the instantiated model.
echo '<pre>';
var_dump($peugeot->getName());

$renault = CarFactory::create('renault');
// return string - Name of the instantiated model.
echo '<pre>';
var_dump($renault->getName());
