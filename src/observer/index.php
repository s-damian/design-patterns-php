<?php

/**
 * Observer.
 */

require_once 'File/Observers/ObserverInterface.php';
require_once 'File/Observers/AudioObserver.php';
require_once 'File/Observers/ImageObserver.php';
require_once 'File/Observers/VideoObserver.php';
require_once 'File/File.php';

use File\File;
use File\Observers\AudioObserver;
use File\Observers\ImageObserver;
use File\Observers\VideoObserver;


// We instantiate the Observers.
$audioObserver = new AudioObserver();
$imageObserver = new ImageObserver();
$videoObserver = new VideoObserver();

// We instantiate a file.
$file = new File();

// Observers are attached to the file.
$file->attach($audioObserver);
$file->attach($imageObserver);
$file->attach($videoObserver);

// We detach an Observer from the file.
$file->dettach($audioObserver);

// We change the name of the file.
// This will automatically notify Observers attached to the file.
$file->setName('Fichier 1');
