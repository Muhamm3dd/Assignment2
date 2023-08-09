<?php
if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"]) || !preg_match("/[0-9]/i", $_POST["password"])) {
    die("Password must contain at least one letter and one number");
}

if ($_POST["password"] !== $_POST["password_confirm"]) {
    die("Password must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require_once("./database.php");
$sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";
$stmt = $mysqli->stmt_init();


if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss", $_POST["name"], $_POST["email"], $password_hash);
if ($stmt->execute()){
    header("Location: signup-success.html");
    exit;
}else{
    if ($mysqli->error ===1062){
        die("email already taken");
    }else{
    die( $mysqli->error . "" . $mysqli->error );
}
}

print_r($_POST);
var_dump($password_hash);
?>
<?php
// Your existing code...

$mysqli = require_once("./database.php");
$sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";

// Your existing code...
?>

<?php
$mysqli = require_once("./database.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // Make sure to handle password hashing properly.

    $sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $name, $email, $password);
        if ($stmt->execute()) {
            // Insertion successful, redirect back to the index page with a success message.
            header("Location: index.php?msg1=insert");
            exit();
        } else {
            // Handle the error here, e.g., display an error message.
            echo "Error: " . $mysqli->error;
        }
        $stmt->close();
    } else {
        // Handle the error here, e.g., display an error message.
        echo "Error: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html>
<!-- Rest of the code remains the same -->
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    $stmt = $mysqli->prepare("INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $passwordHash);

    if ($stmt->execute()) {
        // Redirect with success message
        header("Location: index.php?msg1=insert");
        exit();
    } else {
        // Handle insert error
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>