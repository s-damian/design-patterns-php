<?php

namespace Mailing\MailersLibraries;

class SwiftMailer
{
    public function messageIsSend(): bool
    {
        return true;
    }

    public function confirmmationMessage(): string
    {
        return 'The message has been sent with SwiftMailer';
    }

    public function errorMessage(): string
    {
        return 'An error occurred with the attempt of sending of the message with SwiftMailer';
    }
}
