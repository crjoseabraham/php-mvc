<?php
namespace Models;

use \Models\Database;

class Task
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  /**
   * CREATE
   * @return boolean
   */
  public function createTask($description) : bool
  {
    $this->db->query("INSERT INTO task (`description`,`completed`) VALUES (:task, 0)");
    $this->db->bind(':task', $description);
    if ($this->db->execute())
      return true;
    return false;
  }

  /**
   * READ
   * @return array
   */
  public function selectAll() : array
  {
    $this->db->query("SELECT * FROM task");
    return $this->db->resultSet();
  }

  /**
   * UPDATE
   * @return boolean
   */
  public function changeTaskStatus($id) : bool
  {
    $this->db->query("UPDATE task SET completed = 1 WHERE id = :id");
    $this->db->bind(':id', $id);
    if ($this->db->execute())
      return true;
    return false;
  }

  /**
   * DELETE
   * @return boolean
   */
  public function deleteTask($id) : bool
  {
    $this->db->query("DELETE FROM task WHERE id = :id");
    $this->db->bind(':id', $id);
    if ($this->db->execute())
      return true;
    return false;
  }
}
