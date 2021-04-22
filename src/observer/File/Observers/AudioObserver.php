<?php

namespace File\Observers;

class AudioObserver implements ObserverInterface
{
    /**
     * @param string $fileName
     */
    public function update(string $fileName)
    {
        echo '<p>L\'audio a été renommé "'.$fileName.'"</p>';
    }
}
