<?php

namespace File\Observers;

class ImageObserver implements ObserverInterface
{
    /**
     * @param string $fileName
     */
    public function update(string $fileName)
    {
        echo '<p>L\'image a été renommé "'.$fileName.'"</p>';
    }
}
