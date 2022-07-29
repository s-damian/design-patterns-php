<?php

namespace Mailing\Adapters;

use Mailing\MailersLibraries\PHPMailer;

class PHPMailerAdapter implements AdapterInterface
{
    /**
     * @var MailingInterface
     */
    private PHPMailer $mailing;

    /**
     * PHPMailerAdapter constructor.
     */
    public function __construct(PHPMailer $mailing)
    {
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
