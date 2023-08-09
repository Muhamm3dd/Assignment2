
<?php
$mysqli = require_once("./database.php");

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
<?php
      if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration added successfully
            </div>";
      }
      if (isset($_GET['msg2']) == "update") {
        echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration updated successfully
            </div>";
      }
      if (isset($_GET['msg3']) == "delete") {
       echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Record deleted successfully
            </div>";
      }
    ?>
  <div class= "link">
  <a href="image.php" title="Go to the Home page">IMAGE</a>
  <a href="signup.html  " title="Go to the Home page">SIGNUP</a>
  </div>
  <div class ="name">
  <h1>Registered</h1>
    <hr>
    <div class="container">
	<div class="row">
		<table class="table">
			<tr>
				<th>#</th>
				<th>Full Name</th>
				<th>Email</th>
			</tr>
            <?php
             $sql = "SELECT id, name, email FROM user";
             $result = $mysqli->query($sql);
             
             while ($user = $result->fetch_assoc()) {
                 // Rest of the code for displaying users
             
             
            
			?>
					<tr>
						<td><?php echo $user['id']; ?></td>
						<td><?php echo$user['name'] ; ?></td>
						<td><?php echo $user['email']; ?></td>
                        <td>
                        
                        <button class="btn btn-primary mr-2"><a href="edit.php?editId =<?php echo $user['id']; ?>">
                <i class="fa fa-pencil text-white" aria-hidden="true"></i>update</a></button>
                        <button class="btn btn-danger"><a href="delete.php?id=<?php echo $user['id']; ?>" onclick="confirm('Are you sure want to delete this record')">
                <i class="fa fa-trash text-white" aria-hidden="true"></i>
              delete</a></button>
					</tr>
				<?php
				}
			?>
      
      </table>
	</div>
</div>
  </div>
  <script src="script.js"></script>

  
  <script src="https://replit.com/public/js/replit-badge-v2.js" theme="dark" position="bottom-right"></script>
</body>

</html>