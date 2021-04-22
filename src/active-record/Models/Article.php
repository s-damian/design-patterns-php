<?php

namespace Models;

class Article
{
    /**
     * Type int - Attributs usigned - Index primary - Extra auto_increment
     *
     * @var int
     */
    public $id;

    /**
     * Type varchar(255)
     *
     * @var string
     */
    public $title;

    /**
     * Type varchar(255)
     *
     * @var string
     */
    public $description;

    /**
     * Type longtext
     *
     * @var string
     */
    public $content;

    /**
     * Type varchar(255) - Index unique
     *
     * @var string
     */
    public $slug;

    /**
     * @return self
     */
    public static function load(): self
    {
        return new self();
    }

    /**
     * @param int $id
     * @return $this
     */
    public function find(int $id): self
    {
        $this->id = $id;

        // SELECT * FROM articles WHERE id = ?...
        
        return $this;
    }

    /**
     * Enregistrer un article - Ajouter (INSERT) ou Modifier (UPDATE)
     */
    public function save()
    {
        if ($this->id !== null) {
            // UPDATE articles SET title = ?, description = ?, content = ?, slug = ? WHERE id = ?...
        } else {
            // INSERT INTO article (stitle, description, content, slug) VALUES (?, ?, ?, ?)
        }
    }
}
