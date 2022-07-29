<?php

/**
 * Adapter.
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
 * Example with SwiftMailer.
 */
$swiftMailer = new SwiftMailer();

$mailer = new SwiftMailerAdapter($swiftMailer);

if ($mailer->send()) {
    echo $mailer->getConfirmmation().'<hr>';
} else {
    echo $mailer->getError().'<hr>';
}


/**
 * For example, if one day we want to use the PHPMailer library instead of SwiftMailer,
 * we will just have to change the adapter and pass it the instance of PHPMailer as a constructor parameter.
 * And we will have nothing else to modify in our entire application.
 */
$phpMailer = new PHPMailer();

$mailer = new PHPMailerAdapter($phpMailer);

if ($mailer->send()) {
    echo $mailer->getConfirmmation().'<hr>';
} else {
    echo $mailer->getError().'<hr>';
}


/**
 * And if one day we want to use yet another library,
 * it will suffice to create an adapter for it which will implement the AdapterInterface,
 * and then instantiate this adapter by passing it the instance of the library as a constructor parameter.
 */
