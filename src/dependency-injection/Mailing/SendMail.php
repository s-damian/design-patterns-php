<?php

namespace Mailing;

use Mailing\Contracts\Mailers\MailerInterface;

class SendMail
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendMessage(): string
    {
        if ($this->mailer->send()) {
            return $this->mailer->confirmmationMessage();
        }
        
        return $this->mailer->errorMessage();
    }
}
