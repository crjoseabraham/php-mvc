<?php
namespace Controllers;

use \Models\Task;

class Test
{
    public function __construct()
    {
        $this->taskModel = new Task;
    }

    public function tasks()
    {
        $tasks = $this->taskModel->selectAll();

        view('TestDb/tasks', $tasks);
    }

    public function addTask()
    {
        echo __METHOD__;
    }

    public function markRead($data)
    {
        if ($this->taskModel->changeTaskStatus($data['id']))
        {
            $this->tasks();
        }
    }
}
