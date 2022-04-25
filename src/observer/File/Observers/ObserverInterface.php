<?php

namespace File\Observers;

interface ObserverInterface
{
    /**
     * @param string $fileName
     */
    public function update(string $fileName);
}
