<?php
namespace Controllers\Folder1;

use \Controllers\Controller;

/**
 * ModuleClass file
 * For example for large projects with many folders (modules)
 */
class Class2 extends Controller
{
    public function index($data)
    {
        echo 'This is ' . __CLASS__ . '<br>';
        var_dump($data);
    }
}