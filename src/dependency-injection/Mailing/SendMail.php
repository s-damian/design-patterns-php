<?php

namespace Mailing;

use Mailing\Contracts\Mailers\MailerInterface;

class SendMail
{
    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     *  @param MailerInterface $mailer
     */
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @return string
     */
    public function sendMessage(): string
    {
        if ($this->mailer->send()) {
            return $this->mailer->confirmmationMessage();
        }
        
        return $this->mailer->errorMessage();
    }
}
