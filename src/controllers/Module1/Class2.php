<?php
namespace Controllers\Module1;

use \Controllers\Controller;

/**
 * ModuleClass file
 * For example for large projects with many folders (modules)
 */
class Class2 extends Controller
{
    public function index()
    {
        echo 'This is ' . __CLASS__;
    }
}
