<?php

namespace Mailing\Contracts\Mailers;

interface MailerInterface
{
    /**
     * @return bool
     */
    public function send(): bool;

    /**
     * @return string
     */
    public function confirmmationMessage(): string;

    /**
     * @return string
     */
    public function errorMessage(): string;
}
