<?php
class Database {
    private $connection;

    public function __construct($servername, $username, $password, $database) {
        $this->connection = new mysqli($servername, $username, $password, $database);

        if ($this->connection->connect_error) {
            die("Database Connection Failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection() {
        return $this->connection;
    }
// Update student data
public function updateRecord($postData)
{
  $fname = $this->connection->real_escape_string($postData['ufname']);
  $lname = $this->connection->real_escape_string($postData['ulname']);
  $email = $this->connection->real_escape_string($postData['uemail']);
 
  $id = $this->connection->real_escape_string($postData['id']);

  if (!empty($id) && !empty($postData)) {
    $query = "UPDATE user SET name = '$name', email = '$email' WHERE id = '$id'";
    $sql = $this->connection->query($query);
    if ($sql == true) {
      header("Location: index.php?msg2=update");
    } else {
      echo "Registration update failed. Try again!";
    }
  }
}
    public function deleteRecord($id) {
        $query = "DELETE FROM user WHERE id = '$id'";
        $sql = $this->connection->query($query);
        if ($sql == true) {
            header("Location: index.php?msg3=delete");
        } else {
            echo "Record does not delete. Try again";
        }
    }
}

$database = new Database("localhost", "root", "", "login_db");
$mysqli = $database->getConnection();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $result = $database->deleteRecord($id);
    if ($result) {
        header("Location: index.php?msg3=delete");
    } else {
        echo "Record does not delete. Try again";
    }
}

return $mysqli;
?>
