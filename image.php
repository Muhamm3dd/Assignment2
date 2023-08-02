<!-- $_FILES['file']['name'] - The original name of the file to be uploaded.

$_FILES['file']['type'] - The mime type of the file.

$_FILES['file']['size'] - The size, in bytes, of the uploaded file.

$_FILES['file']['tmp_name'] - The temporary filename of the file in which the uploaded file was stored on the server. -->
<?php
  $pageTitle = 'Homepage';
  $pageDesc = 'This week we will be using PHP to upload images';
//   include './inc/';
  require "database.php";
  if(isset($_POST['submit'])) {
    // Count total files
    $countfiles = count($_FILES['files']['name']);
    // Prepared statement
    $query = "INSERT INTO /customers (Iname,image) VALUES(?,?)";
    $statement = $conn->prepare($query);
    // Loop all files
    for($i = 0; $i < $countfiles; $i++) {
      // File name
      $filename = $_FILES['files']['name'][$i];
      // Location
      $target_file = './uploads/'.$filename;
      // file extension
      // The pathinfo() returns information about a file path.
      // PATHINFO_EXTENSION - return only extension
      $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
      $file_extension = strtolower($file_extension);
      // Valid image extension
      $valid_extension = array("png","jpeg","jpg");
      if(in_array($file_extension, $valid_extension)) {
        // Upload file
        if(move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)){
          // Execute query
          $statement->execute(
          array($filename,$target_file));
        }
      }
    }
  }
?>
  <section class="masthead">
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
<!-- <?php require './inc/footer.php'; ?> -->

