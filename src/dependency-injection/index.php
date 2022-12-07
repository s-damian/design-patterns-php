<?php

/**
 * Dependency injection.
 */

require_once 'Mailing/Contracts/Mailers/MailerInterface.php';
require_once 'Mailing/Mailers/SwiftMailer.php';
require_once 'Mailing/Mailers/PHPMailer.php';
require_once 'Mailing/SendMail.php';

use Mailing\SendMail;
use Mailing\Mailers\SwiftMailer;
use Mailing\Mailers\PHPMailer;

/**
 * In this example, Mailers "\Mailing\Mailers\SwiftMailer" and "\Mailing\Mailers\PHPMailer" implement the
 * interface/contract "\Mailing\Contracts\Mailier\FormatterInterface".
 *
 * The class "\Mailing\SendMail" expects as a dependency in its constructor a class that implements the
 * interface/contract "\Mailing\Contracts\Mailier\FormatterInterface".
 *
 * And we can then send the message with the "sendMessage" method of the class "\Mailing\SendMail".
 *
 * In this example, we see that we can replace the dependency injected into the constructor of "\Mailing\SendMail".
 */


$swiftMailer = new SwiftMailer();

$sendMail = new SendMail($swiftMailer);
// return string - Returns the confirmation message of SwiftMailer.
echo '<pre>';
var_dump($sendMail->sendMessage());


/**
 * So we can replace the injected dependency "\Mailing\Mailers\SwiftMailer" by "\Mailing\Mailers\PHPMailer".
 */


$phpMailer = new PHPMailer();

$sendMail = new SendMail($phpMailer);
// return string - Returns the confirmation message of PHPMailer.
echo '<pre>';
var_dump($sendMail->sendMessage());
