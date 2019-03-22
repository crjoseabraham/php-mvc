<?php
namespace Controllers\Folder1;

/**
 * ModuleClass file
 * For example for large projects with many folders (modules)
 */
class Class2
{
    public function index($data)
    {
        echo 'This is ' . __CLASS__ . '<br>';
        var_dump($data);
    }
}