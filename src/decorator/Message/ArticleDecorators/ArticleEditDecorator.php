<?php

namespace Message\ArticleDecorators;

use Message\ArticleInterface;

class ArticleEditDecorator implements ArticleInterface
{
    /**
     * ArticleInterface
     */
    private ArticleInterface $article;

    /**
     * ArticleEditDecorator constructor.
     */
    public function __construct(ArticleInterface $article)
    {
        $this->article = $article;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->article->getMessage().' edité.';
    }
}
