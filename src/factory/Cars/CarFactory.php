<?php

namespace Cars;

use Exception;
use Cars\Models\Peugeot;
use Cars\Models\Renault;

class CarFactory
{
    /**
     * Factory
     *
     * @param string $model
     * @return mixed
     */
    public static function create(string $model)
    {
        switch (strtolower($model)) {
            case 'peugeot':
                return new Peugeot();

            case 'renault':
                return new Renault();
            
            default:
                throw new Exception('Model '.$model.' not exist.');
                
                break;
        }
    }
}
