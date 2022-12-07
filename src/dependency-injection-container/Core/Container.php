<?php

namespace Core;

use Exception;

/**
 * Container.
 */
class Container
{
    /**
     * @var array - To save the values.
     */
    private array $registry = [];

    /**
     * @var array - To save instances (forever the same instance).
     */
    private array $instances = [];

    /**
     * @var array - To save instances (for each time a new instance).
     */
    private array $factories = [];

    /**
     * Will be used to always return the same instance.
     */
    public function set(string $key, callable $callable): void
    {
        $this->registry[$key] = $callable;
    }

    /**
     * Will be used to return a new instance each time.
     */
    public function setFactory(string $key, callable $callable): void
    {
        $this->factories[$key] = $callable;
    }

    /**
     * @return object - An instance.
     */
    public function get(string $key): object
    {
        // For if a new instance is called each time.
        if (isset($this->factories[$key])) {
            return $this->factories[$key]($this);
        }

        // For if we always call the same instance.
        if (!isset($this->instances[$key])) {
            if (!isset($this->registry[$key])) {
                throw new Exception('Instance '.$key.' not exist.');
            }

            $this->instances[$key] = $this->registry[$key]($this);
        }

        return $this->instances[$key];
    }
}
