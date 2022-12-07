<?php

namespace Mailing\Mailers;

use Mailing\Contracts\Mailers\MailerInterface;

class PHPMailer implements MailerInterface
{
    public function send(): bool
    {
        return true;
    }

    public function confirmmationMessage(): string
    {
        return 'The message has been sent with PHPMailer.';
    }

    public function errorMessage(): string
    {
        return 'An error occurred with the attempt of sending of the message with PHPMailer.';
    }
}
