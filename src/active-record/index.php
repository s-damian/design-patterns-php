<?php

/**
 * Active record.
 */

require_once 'Models/Article.php';

use Models\Article;

/**
 * In this example, we add a new article.
 */
$article = new Article();
$article->title = 'Titre 1';
$article->description = 'Description Article 1';
$article->content = 'Contenu Article 1';
$article->slug = 'article-1';
$article->save();

/**
 * In this example, we modify an article (the one with id 12).
 */
$article = Article::load()->find(12);
$article->title = 'Titre 2';
$article->description = 'Description Article 2';
$article->content = 'Contenu Article 2';
$article->slug = 'article-2';
$article->save();
