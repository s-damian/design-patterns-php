<?php

namespace File\Observers;

use File\FileInterface;

interface ObserverInterface
{
    /**
     * @param string $fileName
     */
    public function update(string $fileName);
}
