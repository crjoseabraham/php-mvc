<?php 

$router->get('', 'Index@get');
$router->post('add-task', 'Task@add');
$router->get('add-task', 'Task@get');
$router->post('delete-task', 'Task@delete');
$router->post('mark-task', 'Task@markTask');
$router->get('404', 'Index@error404');