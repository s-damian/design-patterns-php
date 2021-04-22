<?php

/**
 * Active record
 */

require_once 'Models/Article.php';

use Models\Article;


/**
 * Dans cette exemple, on ajoute un nouvelle Article.
 * On fait donc une requête SQL INSERT INTO...
 */
$article = new Article();
$article->title = 'Titre 1';
$article->description = 'Description Article 1';
$article->content = 'Contenu Article 1';
$article->slug = 'article-1';
$article->save();


/**
 * Dans cette exemple, on modifie un Article (celui qui a l'id 12).
 * On fait donc une requête SQL SELECT... pour récupérer l'article,
 * et on fait ensuite une requête SQL UPDATE...
 */
$article = Article::load()->find(12);
$article->title = 'Titre 2';
$article->description = 'Description Article 2';
$article->content = 'Contenu Article 2';
$article->slug = 'article-2';
$article->save();
