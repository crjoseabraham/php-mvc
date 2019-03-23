<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

App\Router::load(APPROOT . '/src/app/routes.php')->redirect();