<?php

namespace Mailing\Adapters;

use Mailing\MailersLibraries\PHPMailer;

class PHPMailerAdapter implements AdapterInterface
{
    public function __construct(
        private PHPMailer $mailing
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
        return $this->mailing->sendMessage();
    }

    public function getConfirmmation(): string
    {
        return $this->mailing->responseConfirmmationMessage();
    }

    public function getError(): string
    {
        return $this->mailing->responseErrorMessage();
    }
}
