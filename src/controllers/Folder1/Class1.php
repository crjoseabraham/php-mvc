<?php
namespace Controllers\Folder1;

use \Controllers\Controller;

/**
 * ModuleClass file
 * For example for large projects with many folders (modules)
 */
class Class1 extends Controller
{
    public function index()
    {
        echo 'This is ' . __CLASS__;
    }
}
