<?php

namespace Mailing\Adapters;

use Mailing\MailersLibraries\SwiftMailer;

class SwiftMailerAdapter implements AdapterInterface 
{
    /**
     * @var MailingInterface
     */
    private SwiftMailer $mailing;

    /**
     * MailingInterface constructor.
     *
     * @param SwiftMailer
     */
    public function __construct(SwiftMailer $mailing)
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
        return $this->mailing->messageIsSend();
    }

    /**
     * @return string
     */
    public function getConfirmmation(): string
    {
        return $this->mailing->confirmmationMessage();
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->mailing->errorMessage();
    }
}
