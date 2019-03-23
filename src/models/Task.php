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

    public function selectAll() : array
    {
        $this->db->query("SELECT * FROM task");
		return $this->db->resultSet();
    }

    public function changeTaskStatus($id) : bool
    {
        $this->db->query("UPDATE task SET completed = 1 WHERE id = :id");
        $this->db->bind(':id', $id);
        if ($this->db->execute())
            return true;
        return false;
    }
    
}
