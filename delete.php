<?php
$mysqli = require_once("./database.php");
$database = new Database("localhost", "root", "", "login_db");
$mysqli = $database->getConnection();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM user WHERE id = '$id'";
    $result = $mysqli->query($query);
    
    if ($result) {
        header("Location: index.php?msg3=delete");
    } else {
        echo "Record does not delete. Try again";
    }
}
?>
