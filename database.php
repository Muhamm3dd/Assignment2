<?php

class database{
  private $servername = "localhost";
  private $username   = "root";
  private $password   = "";
  private $database   = "mydb";
  public  $con;


  // Database Connection
  public function __construct()
  {
    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
    if(mysqli_connect_error()) {
      trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
    }
  }

   // Insert customer data into customer table
  public function insertData($post)
  {
    $Name = $this->con->real_escape_string($_POST['Name']);
    $Email = $this->con->real_escape_string($_POST['Email']);
    $Program = $this->con->real_escape_string($_POST['Program']);
    $Course = $this->con->real_escape_string($_POST['Course']);
    $GPA = $this->con->real_escape_string($_POST['GPA']);

    $query="INSERT INTO customers(Name,Email,Program, Course, GPA) VALUES('$Name','$Email','$Program', '$Course', '$GPA')";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg1=insert");
    }else{
      echo "Registration failed try again!";
    }
  }

  // Fetch customer records for show listing
  public function displayData()
  {
    $query = "SELECT * FROM customers";
    $result = $this->con->query($query);
    if ($result != false){
    if ($result->num_rows > 0) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
   } }else{
      echo "No found records";
    }
  }


  // Fetch single data for edit from customer table
  public function displayRecordById($Id)
  {
    $query = "SELECT * FROM customers WHERE Id = '$Id'";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }else{
      echo "Record not found";
    }
  }


  // Update customer data into customer table
  public function updateRecord($postData)
  {
    
    $Name = $this->con->real_escape_string($_POST['Name']);
    $Email = $this->con->real_escape_string($_POST['Email']);
    $Program = $this->con->real_escape_string($_POST['Program']);
    $Course = $this->con->real_escape_string($_POST['Course']);
    $GPA = $this->con->real_escape_string($_POST['GPA']);

    $id = $this->con->real_escape_string($_POST['id']);
    if (!empty($id) && !empty($postData)) {
      $query = "UPDATE customers SET name = '$name', email = '$email', salary = '$salary' WHERE id = '$id'";
      $sql = $this->con->query($query);
      if ($sql==true) {
        header("Location:index.php?msg2=update");
      }else{
        echo "Registration updated failed try again!";
      }
    }

  }

  // Delete customer data from customer table
  public function deleteRecord($Id)
  {
    $query = "DELETE FROM customers WHERE Id = '$Id'";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg3=delete");
    }else{
      echo "Record does not delete try again";
    }
  
}
}