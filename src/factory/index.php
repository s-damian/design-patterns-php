<?php

/**
 * Facory
 */

require_once 'Cars/CarFactory.php';
require_once 'Cars/Models/Peugeot.php';
require_once 'Cars/Models/Renault.php';

use Cars\CarFactory;

/**
 * Dans cette exemple,
 * grèace à la méthode "create" de la classe "Cars\CarFactory" on peux instancier les Models de Cars.
 */


$peugeot = CarFactory::create('peugeot');
// return string - Nom du model instancié
echo '<pre>'; var_dump($peugeot->getName());


$renault = CarFactory::create('renault');
// return string - Nom du model instancié
echo '<pre>'; var_dump($renault->getName());
