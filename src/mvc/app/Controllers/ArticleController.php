<?php

namespace App\Controllers;

/**
 * Article management.
 */
class ArticleController extends Controller
{
    /**
     * List of articles.
     */
    public function index()
    {
        return $this->view('article/index', [
            'baliseTitle' => 'Article listing title',
            'metaDescription' => 'Article listing description',
        ]);  
    }
}
