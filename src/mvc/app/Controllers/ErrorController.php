<?php

namespace App\Controllers;

/**
 * Error management.
 */
class ErrorController extends Controller
{
    /**
     * HTTP Error 404.
     */
    public function show404()
    {
        $this->header('HTTP/1.0 404 Not Found');

        return $this->view('error/404', [
            'baliseTitle' => 'Error 404 title',
            'metaDescription' => 'Error 404 desciption',
        ]);  
    }
}
