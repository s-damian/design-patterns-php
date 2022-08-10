<?php

namespace Core\Http;

/**
 * Request
 */
class Request
{
    /**
     * @param string $method - HTTP method passed as a parameter.
     * @return bool - True if request method is equal to method passed as parameter.
     */
    public static function isMethod(string $method): bool
    {
        return self::getMethod() === strtoupper($method);
    }

    /**
     * @return string - HTTP method used to access the page. 'GET', 'POST', 'PUT', 'PATCH', 'DELETE', etc.
     */
    public static function getMethod(): string
    {
        $methodPost = strtoupper(Input::post('_method'));

        if (Input::hasPost('_method') && (in_array($methodPost, ['PUT', 'PATCH', 'DELETE']))) {
            return $methodPost;
        }

        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return string - The URI that was provided to access this page.
     */
    public static function getRequestUri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }
}
