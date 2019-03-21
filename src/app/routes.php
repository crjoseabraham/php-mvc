<?php 

// Static pages routes
$router->addRoute('', ['controller' => 'Index', 'action' => 'home']);
$router->addRoute('about', ['controller' => 'Index', 'action' => 'about']);

// Routes in main controllers/ folder (Namespace \Controllers)
$router->addRoute('{controller}/{action}');
$router->addRoute('{controller}/{action}/{id:\d+}');
$router->addRoute('{controller}/{id:\d+}/{action}');

// Routes in folder controllers/module1/ (Namespace \Controllers\Module1)
$router->addRoute('module1/{controller}/{action}', ['namespace' => 'Module1']);
$router->addRoute('module1/{controller}/{id:\d+}/{action}', ['namespace' => 'Module1']);

// Routes in folder controllers/module2/ (Namespace \Controllers\Module2)
$router->addRoute('module2/{controller}/{action}', ['namespace' => 'Module2']);
$router->addRoute('module2/{controller}/{id:\d+}/{action}', ['namespace' => 'Module2']);

$router->setParams(getUri());