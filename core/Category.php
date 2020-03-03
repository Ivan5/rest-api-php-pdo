<?php

class Category
{
  //db stuff
  private $conn;
  private $table = 'categories';

  //category properties
  public $id;
  public $name;
  public $created_at;


  //constructor with db connection
  public function __construct($db)
  {
    $this->conn = $db;
  }

  //getting the posts from our database
  public function read()
  {
    //create query
    $query = 'SELECT * FROM ' . $this->table;

    //Prepare the statement
    $stmt = $this->conn->prepare($query);
    //execute
    $stmt->execute();

    return $stmt;
  }
}
