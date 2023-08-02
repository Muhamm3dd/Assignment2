<?php
require_once("./Database.php");
$res = $database->read();
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $res->deleteRecord($id);
     $servername = "localhost";
   $username   = "root";
   $password   = "";
   $database   = "mydb";
  $this->connection = mysqli_connect('localhost', 'root', '', 'mydb');
  
    $sql = "DELETE INTO CUSTOMER (Name, Email, Program, Course, GPA) VALUES ('$Name', '$Email','$Program', '$Course', '$GPA' )";
    $res = mysqli_query($this->connection, $sql);
    
  }
  header("location:/mydb/index.php");
  exit;
  
  
  ?>