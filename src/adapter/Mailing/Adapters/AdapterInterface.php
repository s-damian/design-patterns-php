<?php

namespace Mailing\Adapters;

interface AdapterInterface
{
    /**
     * @return bool
     */
    public function send(): bool;

    /**
     * @return string
     */
    public function getConfirmmation(): string;

    /**
     * @return string
     */
    public function getError(): string;
}
