<?php

namespace App\Controllers;

/**
 * Home page management.
 */
class HomeController extends Controller
{
    /**
     * Website home page.
     */
    public function show()
    {
        return $this->view('specific-page/home', [
            'baliseTitle' => 'Homepage title',
            'metaDescription' => 'Homepage desciption',
        ]);
    }
}
