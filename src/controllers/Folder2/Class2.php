<?php
namespace Controllers\Folder2;

/**
 * ModuleClass file
 * For example for large projects with many folders (modules)
 * 
 * You can access this file through http://localhost/php-basic-mvc/folder2/class2/123/index
 */
class Class2
{
    public function index($data)
    {
        echo 'This is ' . __CLASS__ . '<br>';
        var_dump($data);
    }
}
