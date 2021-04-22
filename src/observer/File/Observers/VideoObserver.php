<?php

namespace File\Observers;

class VideoObserver implements ObserverInterface
{
    /**
     * @param string $fileName
     */
    public function update(string $fileName)
    {
        echo '<p>La vidéo a été renommé "'.$fileName.'"</p>';
    }
}
