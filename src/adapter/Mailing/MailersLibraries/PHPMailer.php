<?php

namespace Mailing\MailersLibraries;

class PHPMailer
{
    /**
     * @return bool
     */
    public function sendMessage(): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public function responseConfirmmationMessage(): string
    {
        return 'The message has been sent with PHPMailer';
    }

    /**
     * @return string
     */
    public function responseErrorMessage(): string
    {
        return 'An error occurred with the attempt of sending of the message with PHPMailer';
    }
}
