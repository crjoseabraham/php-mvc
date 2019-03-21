<?php 

// Static pages routes
$router->addRoute('', ['controller' => 'Index', 'action' => 'home']);
$router->addRoute('about', ['controller' => 'Index', 'action' => 'about']);

// Routes in main controllers/ folder (Namespace \Controllers)
$router->addRoute('{controller}/{action}');
$router->addRoute('{controller}/{action}/{id:\d+}');
$router->addRoute('{controller}/{id:\d+}/{action}');

// Routes in folder controllers/folder1/ (Namespace \Controllers\Folder1)
$router->addRoute('folder1/{controller}/{action}', ['namespace' => 'Folder1']);
$router->addRoute('folder1/{controller}/{id:\d+}/{action}', ['namespace' => 'Folder1']);

// Routes in folder controllers/folder2/ (Namespace \Controllers\Folder2)
$router->addRoute('folder2/{controller}/{action}', ['namespace' => 'Folder2']);
$router->addRoute('folder2/{controller}/{id:\d+}/{action}', ['namespace' => 'Folder2']);

$router->setParams(getUri());