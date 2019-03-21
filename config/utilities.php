<?php 
/**
 * Get URI path.
 * Returns a string.
 */
function getUri() : string
{
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $uri = explode('/', $uri);
    array_shift($uri);
    $uri = implode('/', $uri);
    
    return $uri;
}
/** 
 * Get request method.
 * Returns a string.
 */
function getMethod() 
{
    $method = $_SERVER['REQUEST_METHOD'];
    
    return $method;
}