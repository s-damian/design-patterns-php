<?php

namespace Mailing\Adapters;

use Mailing\MailersLibraries\SwiftMailer;

class SwiftMailerAdapter implements AdapterInterface
{
    public function __construct(
        private SwiftMailer $mailing
    ) {
        $this->mailing = $mailing;
    }

    /**
     * Try to send the email.
     *
     * @return bool - True if the email is sent successfully.
     */
    public function send(): bool
    {
        return $this->mailing->messageIsSend();
    }

    public function getConfirmmation(): string
    {
        return $this->mailing->confirmmationMessage();
    }

    public function getError(): string
    {
        return $this->mailing->errorMessage();
    }
}
