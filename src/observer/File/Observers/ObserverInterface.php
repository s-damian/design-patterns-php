<?php

namespace File\Observers;

interface ObserverInterface
{
    public function update(string $fileName): void;
}
