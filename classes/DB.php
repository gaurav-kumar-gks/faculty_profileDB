<?php

/* 
  DB class
  - connect with db
  - get instance of db
  - run queries on the selected instance of db
*/

class DB
{

  /* 
    members
  */

  private static $_instance = null; 
  private $_pdo;
  private $_query;
  private $_error = false;
  private $_results;
  private $_count = 0;


  /* 
    Methods
  */

  /*
    CONNECT WITH DB
  */
  private function __construct(){
    try {
       
      $dsn = 'mysql:dbname=faculty_profile_db;host=db'; 
      $user = 'root';
      $password = 'jrtalent';
      
      
      // docker-compose file must have same dbname
      
      // $dsn = 'mysql:dbname=faculty_profile_db; host=db'; 
      // $user = 'testuser2';
      // $password = 'Test@2021x';
      $this->_pdo = new PDO($dsn, $user, $password); // php PDO documentation

    } catch (PDOException $e) {
      echo "failed to connect to db";
      die($e->getMessage());
    }
  }

  /*
    GET DB INSTANCE
  */
  public static function getInstance()
  {
    if (!isset(self::$_instance)) {
      self::$_instance = new DB();
    }
    return self::$_instance;
  }

  
  /*
    QUERY EXECUTE - takes sql query and executes it
  */
  public function query($sql, $params = array())
  {
    $this->_error = false;
    
    if ($this->_query = $this->_pdo->prepare($sql)) {
      $x = 1;
      if (count($params)) {
        foreach ($params as $param) {
          $this->_query->bindValue($x, $param);
          $x++;
        }
      }
      //echo "<br>"; var_dump($this->_query) ;

      if ($this->_query->execute()) {
        $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
        $this->_count = $this->_query->rowCount();
        // echo "EXECUTED";
        // echo "Result<br>";
        // echo "Rowcount : ";
        //echo $this->_count;
     
      } else {
        //echo " query failed to execute ";
        $this->_error = true;
      }
    }
    return $this;
  }

  /* 
  
    SELECT QUERY MAKER

    SELECT QUERY 0 MAKER - 1 WHERE CONDITION
    SELECT QUERY 1 MAKER - 2 WHERE CONDITION
  
  */

  // SELECT QUERY0 MAKER - 1 WHERE CONDITION
  public function action($action, $table, $col1,$op1, $val1)
  {
    $sql = "{$action} FROM {$table} WHERE {$col1} {$op1} '{$val1}'";
    //echo $sql;
    if($this->query($sql)){
      return $this;
    }
    return false;
  }

  // SELECT QUERY1 MAKER - 2 WHERE CONDITION
  public function action1($action, $table, $col1,$op1, $val1, $col2,$op2, $val2)
  {
    $sql = "{$action} FROM {$table} WHERE {$col1} {$op1} '{$val1}' AND {$col2} {$op2} '{$val2}'";
    // echo $sql;
    if($this->query($sql)){
      return $this;
    }
    return false;
  }

  /*
    
    QUERY FUNCTIONS

    SELECT QUERY 0, 1
    DELETE QUERY
    INSERT QUERY
    UPDATE QUERY
    RETURN FIRST ROW OF RESULT
    RETURN ROWCOUNT OF RESULT
    RETURN ERROR 


  */

  // SELECT QUERY 0 - 1 WHERE CONDITION
  public function get($table, $col1, $op1, $val1)
  {
    return $this->action("SELECT *", $table, $col1, $op1, $val1);
  }

  // SELECT QUERY 1 - 2 WHERE CONDITION 
  public function get1($table, $col1, $op1, $val1, $col2, $op2, $val2)
  {
    return $this->action1("SELECT *", $table, $col1, $op1, $val1, $col2, $op2, $val2);
  }
  
  // DELETE QUERY 
  public function delete($table, $col1, $op1, $val1)
  {
    return $this->action('DELETE', $table, $col1, $op1, $val1);
  }

  // INSERT QUERY
  public function insert($table, $fields = array())
  {

    $keys = array_keys($fields);
    $values = null;
    $x = 1;

    foreach ($fields as $field) {
      $values .= '?';
      if ($x < count($fields)) {
        $values .= ', ';
      }
      $x++;
    }

    $sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";

    if (!$this->query($sql, $fields)->error()) {
      return true;
    } 
    return false;
  }

  // UPDATE QUERY ON LOGIN
  public function update($table, $condition, $mail, $fields = array())
  {
    $x = 1;
    $set = '';

    foreach ($fields as $name => $value) {
      $set .= "{$name} = ?" ;
      if ($x < count($fields)) {
        $set .= ', ';
      }
      $x++;
    }
 
    $sql = "UPDATE {$table} SET {$set} WHERE {$condition} = '{$mail}'";
  
    if (!$this->query($sql, $fields)->error()) {
      return true;
    } 
    return false;
  }

  // QUERY RESULT 
  public function results()
  {
    return $this->_results;
  }

  // FIRST RESULT OF SELECT QUERY
  public function first()
  {
    return $this->results()[0];
  }

  // RETURN ROWCOUNT OF SELECT QUERY RESULT
  public function count()
  {
    return $this->_count;
  }
  // RETURN ERROR COUNT
  public function error()
  {
    return $this->_error;
  }
}
