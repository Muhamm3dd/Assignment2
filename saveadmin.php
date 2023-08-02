<?php
					 	require_once("./Database.php");
						if(isset($_POST) & !empty($_POST)){
							$fname = $_POST['fname'];
							$lname = $_POST['lname'];
							$email = $_POST['email'];
                            $password = $_POST['password'];
	                        $confirm = $_POST['confirm'];
							$res   = $database->create($fname, $lname, $email);
							if($res){
								echo "<p>Successfully inserted data</p>";
							}else{
								echo "<p>Failed to insert data</p>";
							}
						}
                        $ok = true;
	
		if (empty($fname)) {
			echo '<p>First name required</p>';
			$ok = false;
		}
		if (empty($lname)) {
			echo '<p>Last name required</p>';
			$ok = false;
		}
		if (empty($email)) {
			echo '<p>Username required</p>';
			$ok = false;
		}
		if ((empty($password)) || ($password != $confirm)) {
			echo '<p>Invalid passwords</p>';
			$ok = false;
		}
	// decide if we are saving or not
	if ($ok){
		$password = hash('sha512', $password);
		// set up the sql
		$sql = "INSERT INTO Student (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password');";
		$conn->exec($sql);
    	echo '<section class="success-row">';
		echo '<div>';
		echo '<h3>Admin Saved</h3>';
		echo '</div>';
    	echo '</section>';
		//disconnect
		$res  = null;
	}
	?>
	<section class="row success-back-row">
		<div>
			<p>All setup, click the button below to head to the sign in page!</p>
			<a href="signin.php" class="btn btn-primary">Sign In</a>
		</div>
	</section>


					 
