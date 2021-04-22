<?php

namespace Facades;

/**
 * Classe parent de toute les Façades (où on veut qu'une seule instance dans toute l'application)
 */
abstract class Facade
{
    /**
     * @return string
     */
    abstract protected static function getFacadeAccessor();
    
    /**
     * @param string $method - Nom de la méthode à appeler
     * @param array $arguments - Paramètres dans méthodes
     * @return mixed
     */
    final public static function __callStatic(string $method, array $arguments)
    {
        if (static::$instance === null) {            
            static::$instance = self::getFacadeInstace();
        }

        return static::$instance->$method(...$arguments);
    }

    /**
     * @return mixed
     */
    private static function getFacadeInstace()
    {
        $class = static::getFacadeAccessor();
        
        return new $class();
    }
}
