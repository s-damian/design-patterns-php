<?php

/**
 * Dependency injection container (DIC)
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
 * Dans cette exemple, les Mailers "\Mailing\Mailers\SwiftMailer" et "\Mailing\Mailers\PHPMailer" implémentent
 * l'interface/contrat "\Mailing\Contracts\Mailier\FormatterInterface".
 *
 * La classe "\Mailing\SendMail" attend en dépendance dans son constructeur une classe qui
 * implémente l'interface/contrat "\Mailing\Contracts\Mailier\FormatterInterface".
 *
 * Et on peut ensuite envoyer le message avec la méthode "sendMessage" de la classe "\Mailing\SendMail".
 *
 * Dans cette exemple on constate donc qu'on remplacer la dépendance injectée dans le constructeur de "\Mailing\SendMail".
 */


$container = new Container();

// On donne comme valeur une instance de "Mailing\Mailers\SwiftMailer" à la clé swift_mailer.
// On utilise la méthode "set" car on veut toujours la même instance de "\Mailing\Mailers\SwiftMailer".
$container->set('swift_mailer', function ($container) {
    return new SwiftMailer();
});

// On donne comme valeur une instance de "\Mailing\SendMail" à la clé send_mail.
// Et on injecte en dépendance à "\Mailing\SendMail" une instance de "\Mailing\Mailers\SwiftMailer".
// On utilise la méthode "setFactory" à chaque fois une nouvelle instance de "\Mailing\Mailers\SwiftMailer".
// C'est un peu comme un système de Factory mais qui a l'avantage d'être dynamique et d'être bougé au fu et à mesure.
$container->setFactory('send_mail', function ($container) {
    return new SendMail($container->get('swift_mailer'));
});


// return object Mailing\SendMail - Instance de "\Mailing\SendMail" qui a "\Mailing\Mailers\SwiftMailer" comme dépendance injectée.
echo '<pre>'; var_dump($container->get('send_mail'));
