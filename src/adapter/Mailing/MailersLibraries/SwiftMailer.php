<?php

namespace Mailing\MailersLibraries;

class SwiftMailer
{
    /**
     * @return bool
     */
    public function messageIsSend(): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public function confirmmationMessage(): string
    {
        return 'The message has been sent with SwiftMailer';
    }

    /**
     * @return string
     */
    public function errorMessage(): string
    {
        return 'An error occurred with the attempt of sending of the message with SwiftMailer';
    }
}
