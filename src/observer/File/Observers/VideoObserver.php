<?php

namespace File\Observers;

class VideoObserver implements ObserverInterface
{
    public function update(string $fileName): void
    {
        echo '<p>La vidéo a été renommé "'.$fileName.'"</p>';
    }
}
