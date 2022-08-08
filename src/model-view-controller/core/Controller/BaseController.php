<?php

namespace Core\Controller;

use Core\Http\Response;

/**
 * Parent Controller.
 */
abstract class BaseController
{
    /**
     * To possibly use a layout other than the default one.
     */
    private string $layout;

    /**
     *  BaseController constructor.
     */
    public function __construct()
    {
        $this->layout = 'site';
    }

    /**
     * To possibly use a layout other than the default one.
     *
     * @param string $layout
     */
    final protected function setLayout(string $layout): void
    {
        $this->layout = $layout;
    }

    /**
     * Return view.
     */
    final protected function view(string $view, array $data = []): never
    {       
        if ($data) extract($data);

        ob_start();
        require base_path().'/app/views/'.$view.'.php';
        $contentInLayout = ob_get_clean();

        require base_path().'/app/views/layouts/'.$this->layout.'.php';

        exit();
    }

    /**
     * Specify the HTTP header for displaying a view.
     */
    final protected function header(string $content, string $type = null): void
    {
        Response::header($content, $type);
    }
}
