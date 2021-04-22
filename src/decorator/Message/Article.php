<?php

namespace Message;

class Article implements ArticleInterface
{
    /**
     * @return string
     */
    public function getMessage(): string
    {
        return 'Article 1 :';
    }
}
