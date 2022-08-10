<?php

namespace Core\Contracts\Routing;

interface RouterInterface
{
    /**
     * Singleton.
     */
    public static function getInstance(): self;

    /**
     * Add a route.
     */
    public function add(string $path, string $action): void;

    /**
     * Execute Routing.
     */
    public function run(): mixed;
}
