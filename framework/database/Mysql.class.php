<?php

class Mysql
{

  protected $conn = false;

  protected $sql;


  public function __construct($config = array())
  {

    $host = isset($config['host']) ? $config['host'] : 'localhost';

    $user = isset($config['user']) ? $config['user'] : 'root';

    $password = isset($config['password']) ? $config['password'] : '';

    $dbname = isset($config['dbname']) ? $config['dbname'] : '';

    $port = isset($config['port']) ? $config['port'] : '3306';

    $charset = isset($config['charset']) ? $config['charset'] : 'utf8';



    $this->conn = mysqli_connect("$host:$port", $user, $password) or die('Database connection error');

    mysqli_select_db($this->conn, $dbname) or die('Database selection error');

    $this->setChar($charset);
  }

  private function setChar($charest)
  {

    $sql = 'set names ' . $charest;

    $this->query($sql);
  }


  public function query($sql)
  {

    $this->sql = $sql;

    // Write SQL statement into log

    $str = $sql . "  [" . date("Y-m-d H:i:s") . "]" . PHP_EOL;

    file_put_contents("log.txt", $str, FILE_APPEND);

    $result = mysqli_query($this->conn, $this->sql);

    if (!$result) {

      die($this->errno() . ':' . $this->error() . '<br />Error SQL statement is ' . $this->sql . '<br />');
    }

    return $result;
  }

  public function getOne($sql)
  {

    $result = $this->query($sql);

    $row = mysqli_fetch_row($result);

    if ($row) {

      return $row[0];
    } else {

      return false;
    }
  }

  public function getRow($sql)
  {

    if ($result = $this->query($sql)) {

      $row = mysqli_fetch_assoc($result);

      return $row;
    } else {

      return false;
    }
  }

  public function getAll($sql)
  {

    $result = $this->query($sql);

    $list = array();

    while ($row = mysqli_fetch_assoc($result)) {

      $list[] = $row;
    }

    return $list;
  }

  public function getCol($sql)
  {

    $result = $this->query($sql);

    $list = array();

    while ($row = mysqli_fetch_row($result)) {

      $list[] = $row[0];
    }

    return $list;
  }



  public function getInsertId()
  {

    return mysqli_insert_id($this->conn);
  }

  public function errno()
  {

    return mysqli_errno($this->conn);
  }


  public function error()
  {

    return mysqli_error($this->conn);
  }

  public function get_affected_row()
  {
    $rows = mysqli_affected_rows($this->conn);
    return $rows;
  }

  public function escape_string($str)
  {
    return mysqli_escape_string($this->conn, $str);
  }
}