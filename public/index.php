<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

Router::load(APPROOT . '/src/app/routes.php')->direct(getUri(), getMethod());