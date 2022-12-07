<?php

namespace File;

use File\Observers\ObserverInterface;

class File
{
    /**
     * @param array - The ObserverInterface.
     */
    private array $observers = [];

    private string $name;

    /**
     * Attach an Observer.
     */
    public function attach(ObserverInterface $observer): void
    {
        $this->observers[] = $observer;
    }

    /**
     * Detach an Observer.
     */
    public function dettach(ObserverInterface $observer): void
    {
        foreach ($this->observers as $key => $obs) {
            if ($obs === $observer) {
                unset($this->observers[$key]);

                break;
            }
        }
    }

    /**
     * Notify Observers.
     */
    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->name);
        }
    }

    /**
     * Change the name of a file.
     */
    public function setName(string $name): void
    {
        $this->name = $name;

        $this->notify();
    }
}
