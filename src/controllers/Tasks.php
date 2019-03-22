<?php
namespace Controllers;

use \Models\Task;

class Tasks
{
    public function __construct()
    {
        $this->taskModel = new Task;
    }

    public function list()
    {
        $tasks = $this->taskModel->selectAll();

        view('TestDb/tasks', $tasks);
    }
}
