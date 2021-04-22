<?php

/**
 * Observer
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


// On instancie les Observers
$audioObserver = new AudioObserver();
$imageObserver = new ImageObserver();
$videoObserver = new VideoObserver();

// On instancie un fichier
$file = new File();

// On attache des Observers au fichier
$file->attach($audioObserver);
$file->attach($imageObserver);
$file->attach($videoObserver);

// On détache un Observer du fichier
$file->dettach($audioObserver);

// On modifie le nom du fichier
// Ceci va automatiquement notifier les Observers attachés au fichier
$file->setName('Fichier 1');
