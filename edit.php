
<?php
$mysqli = require_once("./database.php");
$database = new Database("localhost", "root", "", "login_db");
$mysqli = $database->getConnection();


// Edit customer record
if (isset($_GET['editId']) && !empty($_GET['editId'])) {
  $editId = $_GET['editId'];
  $database = $database->displayRecordById($editId);
}

// Update Record in customer table
if (isset($_POST['update'])) {
  $database->updateRecord($_POST);
  header("locaion:/mydb/index.php");
  exit;
}

// Edit customer record
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['uname'];
    $email = $_POST['uemail'];

    // Perform the database update
    $connection = mysqli_connect('localhost', 'root', '', 'login_db');
    $sql = "UPDATE user SET name = '$name', email = '$email' WHERE id = $id";
    $mysqli = mysqli_query($connection, $sql);

    // Redirect back to the index.php after the update
    header("location: /mydb/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>replit</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">   
</head>

<body>
    <div class="link">
        <a href="View.php">View</a>
    </div>
    <div class="name">
        <div class="title">
            <h1>Update Records</h1>
        </div>

        <div class="line">
            <hr>
        </div>
        <?php
             $sql = "SELECT id, name, email FROM user";
             $result = $mysqli->query($sql);
             
             while ($user = $result->fetch_assoc()) {
                 // Rest of the code for displaying users
             
             
            
			?>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="name">First name:</label><br>
                <input type="text" id="name" name="uname" value="<?php echo $user['name'] ; ?>" required=""><br>
                
                <label for="email">Enter your email:</label><br>
                <input type="email" id="email" name="uemail" value="<?php echo $user['email']; ?>" required=""><br>

                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <input type="submit" id="submit" name="update" value="Update">
            </form>
            <?php } ?>

        <div class="horizon">
            <hr>
        </div>

    </div>

</body>

</html>
