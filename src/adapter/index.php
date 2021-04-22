<?php

/**
 * Adapter
 */

require_once 'Mailing/Adapters/AdapterInterface.php';
require_once 'Mailing/MailersLibraries/SwiftMailer.php';
require_once 'Mailing/Adapters/SwiftMailerAdapter.php';
require_once 'Mailing/MailersLibraries/PHPMailer.php';
require_once 'Mailing/Adapters/PHPMailerAdapter.php';

use Mailing\MailersLibraries\SwiftMailer;
use Mailing\Adapters\SwiftMailerAdapter;
use Mailing\MailersLibraries\PHPMailer;
use Mailing\Adapters\PHPMailerAdapter;


/**
 * Exemple avec SwiftMailer
 */
$swiftMailer = new SwiftMailer();

$mailer = new SwiftMailerAdapter($swiftMailer);

if ($mailer->send()) {
    echo $mailer->getConfirmmation().'<hr>';
} else {
    echo $mailer->getError().'<hr>';
}


/**
 * Par exemple, si un jour on veut utiliser la librairie PHPMailer à la place de SwiftMailer,
 * on a juste à changer l'adapter et à lui passer en paramètredu constructeur l'instance de PHPMailer.
 * Et on aurra rtien d'autre à modifier dans toute notre application.
 */
$phpMailer = new PHPMailer();

$mailer = new PHPMailerAdapter($phpMailer);

if ($mailer->send()) {
    echo $mailer->getConfirmmation().'<hr>';
} else {
    echo $mailer->getError().'<hr>';
}


/**
 * Et si un jour on souhaitera utiliser encore une autre librairie,
 * il suffira de lui créer un adapter qui implémentera l'AdapterInterface,
 * et de ensuite instancier cette adapter en lui passant en paramètre du constructeur l'instance de la librairie.
 */
