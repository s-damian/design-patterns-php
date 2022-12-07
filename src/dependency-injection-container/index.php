<?php

/**
 * Dependency injection container (DIC).
 */

require_once 'Core/Container.php';
require_once 'Mailing/Contracts/Mailers/MailerInterface.php';
require_once 'Mailing/Mailers/SwiftMailer.php';
require_once 'Mailing/Mailers/PHPMailer.php';
require_once 'Mailing/SendMail.php';

use Core\Container;
use Mailing\SendMail;
use Mailing\Mailers\SwiftMailer;

/**
 * In this example, Mailers "\Mailing\Mailers\SwiftMailer" and "\Mailing\Mailers\PHPMailer" implement the
 * interface/contract  "\Mailing\Contracts\Mailier\FormatterInterface".
 *
 * The class "\Mailing\SendMail" expects as a dependency in its constructor a class that implements the
 * interface/contract  "\Mailing\Contracts\Mailier\FormatterInterface".
 *
 * And we can then send the message with the "sendMessage" method of the class "\Mailing\SendMail".
 *
 * In this example, we see that we can replace the dependency injected into the constructor of "\Mailing\SendMail".
 */


$container = new Container();

// We give as value an instance of "\Mailing\Mailers\SwiftMailer" to the key swift_mailer.
// We use the "set" method because we always want the same instance of "\Mailing\Mailers\SwiftMailer".
$container->set('swift_mailer', function ($container) {
    return new SwiftMailer();
});

// We give as value an instance of "\Mailing\SendMail" to the key send_mail.
// And we inject in dependence on "\Mailing\SendMail" an instance of "\Mailing\Mailers\SwiftMailer".
// We use the "setFactory" method each time a new instance of "\Mailing\Mailers\SwiftMailer".
// It's a bit like a Factory system but has the advantage of being dynamic and being moved as you go.
$container->setFactory('send_mail', function ($container) {
    return new SendMail($container->get('swift_mailer'));
});


// return object Mailing\SendMail - Instance of "\Mailing\SendMail" which has "\Mailing\Mailers\SwiftMailer" as an injected dependency.
echo '<pre>';
var_dump($container->get('send_mail'));
