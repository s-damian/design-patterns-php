<?php

/**
 * Public Root Folder Path.
 *
 * @param string|null $file
 * @return mixed
 */
function public_path(string $file = null)
{
    if ($file) {
        return dirname(dirname(dirname(__FILE__))).'/public'.'/'.$file;
    }

    return dirname(dirname(dirname(__FILE__))).'/public';
}

/**
 * Path of the root folder which contains the whole application.
 *
 * @param string|null $file
 * @return mixed
 */
function base_path(string $file = null)
{
    if ($file) {
        return dirname(dirname(dirname(__FILE__))).'/'.$file;
    }

    return dirname(dirname(dirname(__FILE__)));
}
