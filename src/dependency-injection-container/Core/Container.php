<?php

namespace Core;

use Exception;

/**
 * Container.
 */
class Container
{
    /**
     * @var array - Pour enregistrer les valeurs.
     */
    private array $registry = [];

    /**
     * @var array - Pour enregistrer les instances (pour toujours la même instance).
     */
    private array $instances = [];

    /**
     * @var array - Pour enregistrer les instances (pour à chaque fois une nouvelle instance).
     */
    private array $factories = [];

    /**
     * Servira à retourner toujours la même instance.
     *
     * @param string $key
     * @param callable $callable
     */
    public function set(string $key, callable $callable)
    {
        $this->registry[$key] = $callable;
    }

    /**
     * Servira à retourner à chaque fois une nouvelle instance.
     *
     * @param string $key
     * @param callable $callable
     */
    public function setFactory(string $key, callable $callable)
    {
        $this->factories[$key] = $callable;
    }

    /**
     * @param string $key
     * @return mixed - Une instance.
     */
    public function get(string $key)
    {
        // Pour si on appelle à chaque fois une nouvelle instance.
        if (isset($this->factories[$key])) {
            return $this->factories[$key]($this);
        }

        // Pour si on appelle toujours la même instance.
        if (!isset($this->instances[$key])) {
            if (!isset($this->registry[$key])) throw new Exception('Instance '.$key.' not exist.');

            $this->instances[$key] = $this->registry[$key]($this);
        }

        return $this->instances[$key];
    }
}
