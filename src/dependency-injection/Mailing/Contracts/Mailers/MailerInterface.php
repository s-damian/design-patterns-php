<?php

namespace Mailing\Contracts\Mailers;

interface MailerInterface
{
    public function send(): bool;

    public function confirmmationMessage(): string;

    public function errorMessage(): string;
}
