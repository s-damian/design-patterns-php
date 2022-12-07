<?php

namespace Mailing\MailersLibraries;

class PHPMailer
{
    public function sendMessage(): bool
    {
        return true;
    }

    public function responseConfirmmationMessage(): string
    {
        return 'The message has been sent with PHPMailer';
    }

    public function responseErrorMessage(): string
    {
        return 'An error occurred with the attempt of sending of the message with PHPMailer';
    }
}
