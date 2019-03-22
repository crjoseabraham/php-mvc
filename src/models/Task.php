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
    
}
