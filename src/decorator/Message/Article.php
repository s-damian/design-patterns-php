<?php

namespace Message;

class Article implements ArticleInterface
{
    public function getMessage(): string
    {
        return 'Article 1:';
    }
}
