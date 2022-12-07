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
     * Type varchar(255).
     */
    public string $title;

    /**
     * Type varchar(255).
     */
    public string $description;

    /**
     * Type longtext.
     */
    public string $content;

    /**
     * Type varchar(255) - Index unique.
     */
    public string $slug;

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
     * Save an article - Add (INSERT) or modify (UPDATE).
     */
    public function save(): void
    {
        if ($this->id !== null) {
            // UPDATE articles SET title = ?, description = ?, content = ?, slug = ? WHERE id = ?...
        } else {
            // INSERT INTO article (stitle, description, content, slug) VALUES (?, ?, ?, ?)
        }
    }
}
