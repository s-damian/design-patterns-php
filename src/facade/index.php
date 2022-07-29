<?php

/**
 * Facade.
 */

require_once 'Form/Form.php';
require_once 'Facades/Facade.php';
require_once 'Facades/Form.php';

use Form\Form;
use Facades\Form as FormFacade;

/**
 * In this example,
 * either by directly instantiating the "\Form\Form" class and then calling the "open" method,
 * or by making a static call with the Facade "\Facades\Form",
 * we get the same result.
 */

// Example without Facade.
// return string - <form>
$form = new Form();
echo '<pre>'; var_dump($form->open());

// Example with Facade.
// return string - <form>
echo '<pre>'; var_dump(FormFacade::open());
