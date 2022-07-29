<?php

namespace Message\ArticleDecorators;

use Message\ArticleInterface;

class ArticleAddDecorator implements ArticleInterface
{
    /**
     * ArticleInterface
     */
    private ArticleInterface $article;

    /**
     * ArticleAddDecorator constructor.
     */
    public function __construct(ArticleInterface $article)
    {
        $this->article = $article;
    }

    public function getMessage(): string
    {
        return $this->article->getMessage().' added.';
    }
}
