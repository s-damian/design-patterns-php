<?php

namespace Facades;

/**
 * Parent class of all Facades (where we want only one instance in the whole application).
 */
abstract class Facade
{
    /**
     * @param string $method - Name of the method to call.
     * @param array $arguments - Parameters in the method.
     */
    final public static function __callStatic(string $method, array $arguments): mixed
    {
        if (static::$instance === null) {
            static::$instance = self::getFacadeInstace();
        }

        return static::$instance->$method(...$arguments);
    }

    /**
     * @return string
     */
    abstract protected static function getFacadeAccessor();

    private static function getFacadeInstace(): object
    {
        $class = static::getFacadeAccessor();

        return new $class();
    }
}
