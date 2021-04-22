<?php

/**
 * Decorator
 */

require_once 'Message/ArticleInterface.php';
require_once 'Message/Article.php';
require_once 'Message/ArticleDecorators/ArticleAddDecorator.php';
require_once 'Message/ArticleDecorators/ArticleEditDecorator.php';

use Message\Article;
use Message\ArticleDecorators\ArticleAddDecorator;
use Message\ArticleDecorators\ArticleEditDecorator;

$article = new Article();

// return string : 'Article 1 : '
var_dump($article->getMessage());

$article = new ArticleAddDecorator($article);

// return string : 'Article 1 : ajouté.'
var_dump($article->getMessage());

$article = new ArticleEditDecorator($article);

// return string : 'Article 1 :  ajouté. edité.'
var_dump($article->getMessage());
