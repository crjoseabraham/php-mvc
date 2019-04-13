<?php
namespace Controllers;

use \Models\Task;

class Test
{
  public function __construct()
  {
    $this->taskModel = new Task;
  }

  // Render View
  public function tasks()
  {
    view('TestDb/tasks', $this->getTasks());
  }

  // CREATE new task
  public function addTask()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->taskModel->createTask($_POST['new_task']))
      header('location: ' . URLROOT . '/test/tasks', true, 303);
    else
      die(TASK_NOT_CREATED);
  }

  // READ all tasks
  private function getTasks() : array
  {
    return $this->taskModel->selectAll();
  }

  // UPDATE task
  public function markDone($params)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->taskModel->changeTaskStatus($params['id']))
      header('location: ' . URLROOT . '/test/tasks', true, 303);
    else
      die(TASK_NOT_UPDATED);
  }

  // DELETE task
  public function delete($params)
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $this->taskModel->deleteTask($params['id']))
      header('location: ' . URLROOT . '/test/tasks', true, 303);
    else
      die(TASK_NOT_DELETED);
  }
}
