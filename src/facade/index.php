<?php

/**
 * Facade
 */

require_once 'Form/Form.php';
require_once 'Facades/Facade.php';
require_once 'Facades/Form.php';

use Form\Form;
use Facades\Form as FormFacade;

/**
 * Dans cette exemple,
 * que ce soit en instanciant directement la classe "Form/Form" et en appelant ensuite la méthode "open",
 * ou en fesant un appel statique avec la Facaden "Facades/Form",
 * nous obtenons le même résultat.
 */

// Exemple sans Facade
// return string - <form>
$form = new Form();
echo '<pre>'; var_dump($form->open());

// Exemple avec Facade
// return string - <form>
echo '<pre>'; var_dump(FormFacade::open());
