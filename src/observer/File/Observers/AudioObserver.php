<?php

namespace File\Observers;

class AudioObserver implements ObserverInterface
{
    public function update(string $fileName): void
    {
        echo '<p>L\'audio a été renommé "'.$fileName.'"</p>';
    }
}
