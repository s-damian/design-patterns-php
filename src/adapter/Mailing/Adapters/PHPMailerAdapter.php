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
     *
     * @param PHPMailer
     */
    public function __construct(PHPMailer $mailing)
    {
        $this->mailing = $mailing;
    }

    /**
     * Essayer d'envoyer le mail.
     *
     * @return bool - True si le mail est bien parti.
     */
    public function send(): bool
    {
        return $this->mailing->sendMessage();
    }

    /**
     * @return string
     */
    public function getConfirmmation(): string
    {
        return $this->mailing->responseConfirmmationMessage();
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->mailing->responseErrorMessage();
    }
}
