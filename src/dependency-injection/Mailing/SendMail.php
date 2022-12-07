<?php

namespace Mailing;

use Mailing\Contracts\Mailers\MailerInterface;

class SendMail
{
    public function __construct(
        private MailerInterface $mailer
    ) {
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
