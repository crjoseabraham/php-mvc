<?php 
/**
 * Get URI path.
 * Return a string.
 */
function getUri() 
{
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $uri = explode('/', $uri);
    
    return $uri;
}
/** Get request method.
 * Return a string.
 */
function getMethod() 
{
    $method = $_SERVER['REQUEST_METHOD'];
    
    return $method;
}