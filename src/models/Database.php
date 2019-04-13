<?php 
namespace Models;

use \PDO;

/**
 * PDO Database Class
 * Connect to database
 * Create prepared statements
 * Bind values
 * Return rows and results
 */
class Database
{
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $name = DB_NAME;

  private $db_handler;
  private $stmt;
  private $error;

  public function __construct()
  {
    // Set DSN
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->name;
    $options = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    // Create PDO Instance
    try
    {
      $this->db_handler = new PDO($dsn, $this->user, $this->pass, $options);
    }
    catch(PDOException $e)
    {
      $this->error = $e->getMessage();
      echo $this->error;
    }
  }

  // Prepare statement with query
  public function query($sql)
  {
    $this->stmt = $this->db_handler->prepare($sql);
  }

  // Bind values
  public function bind($param, $value, $type = null)
  {
    if (is_null($type))
    {
      switch (true) 
      {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;

        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;

        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        
        default:
          $type = PDO::PARAM_STR;
      }
    }

    $this->stmt->bindValue($param, $value, $type);
  }

  // Execute the prepared statement
  public function execute()
  {
    return $this->stmt->execute();
  }

  // Get result set as array of objects
  public function resultSet()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  // Get single record as object
  public function single()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  // Get row count
  public function rowCount()
  {
    return $this->stmt->rowCount();
  }
}