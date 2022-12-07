<?php

namespace Mailing\Adapters;

interface AdapterInterface
{
    public function send(): bool;

    public function getConfirmmation(): string;

    public function getError(): string;
}
