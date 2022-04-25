<?php

namespace File;

use File\Observers\ObserverInterface;

class File
{
    /**
     * @param array - Les ObserverInterface.
     */
    private array $observers = [];

    /**
     * @var string
     */
    private string $name;

    /**
     * Attacher un Observer.
     *
     * @param ObserverInterface $observer
     */
    public function attach(ObserverInterface $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * Détacher un Observer.
     *
     * @param ObserverInterface $observer
     */
    public function dettach(ObserverInterface $observer)
    {
        foreach ($this->observers as $key => $obs) {
            if ($obs === $observer) {
                unset($this->observers[$key]);
                
                break;
            }
        }
    }

    /**
     * Notifier les Observers.
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->name);
        }
    }

    /**
     * Modifier le nom d'un fichier.
     *
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;

        $this->notify();
    }
}
