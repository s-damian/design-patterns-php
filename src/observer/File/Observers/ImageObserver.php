<?php

namespace File\Observers;

class ImageObserver implements ObserverInterface
{
    public function update(string $fileName): void
    {
        echo '<p>L\'image a été renommé "'.$fileName.'"</p>';
    }
}
