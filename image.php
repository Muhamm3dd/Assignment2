<?php
$pageTitle = 'Homepage';
$pageDesc = 'This week we will be using PHP to upload images';

$mysqli = require_once("./database.php");
$database = new Database("localhost", "root", "", "login_db");
$mysqli = $database->getConnection();

if (isset($_POST['submit'])) {
    // Count total files
    $countfiles = count($_FILES['files']['name']);
    // Prepared statement
    $query = "INSERT INTO  user (name,image) VALUES (?,?)";
    $mysqli = $database->getConnection(); // Use $database->connection to prepare the statement
    $stmt = $mysqli->stmt_init();


    // Loop all files
    // Initialize the prepared statement outside the loop
$stmt = $mysqli->prepare($query);

for ($i = 0; $i < $countfiles; $i++) {
    // File name
    $filename = $_FILES['files']['name'][$i];
    // Location
    $target_file = '.\upload/' . $filename;
    // file extension
    $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
    // Valid image extension
    $valid_extension = array("png", "jpeg", "jpg");
    
    if (in_array($file_extension, $valid_extension)) {
        // Upload file
        if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)) {
            // Execute query
            $stmt->bind_param("ss", $filename, $target_file);
            $stmt->execute();
        }
    }
}

// Close the statement after the loop
$stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>replit</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>upload image</h1>
    <section class="masthead">7
        <div>
            <h1>Uploading Images</h1>
        </div>
    </section>
    <section class="form-row">
        <!-- The enctype attribute specifies how the form-data should be encoded when submitting it to the server.
        use multipart/form-data when your form includes any <input type="file"> -->
        <!-- encoding is the process of putting a sequence of characters into a specialized format for efficient transmission or storage. -->
        <form method='post' action='' enctype='multipart/form-data'>
            <p><input type='file' name='files[]' multiple /></p>
            <p><input class="btn btn-dark" type='submit' value='Submit' name='submit'/></p>
        </form>
        <?php echo "<p>File upload successfully</p>"; ?>
        <a href="view.php" class="btn btn-primary">View Uploads</a>
    </section>
</body>
</html>
