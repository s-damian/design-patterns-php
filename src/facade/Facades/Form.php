<?php

namespace Facades;

/**
 * Facade of the "\Form\Form" class.
 */
final class Form extends Facade
{
    /**
     * @var \Form\Form
     */
    protected static $instance;

    protected static function getFacadeAccessor(): string
    {
        return 'Form\Form';
    }
}
