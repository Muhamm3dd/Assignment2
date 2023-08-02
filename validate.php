<?php
require_once("./Database.php");
$res = $database->read();
//store the user inputs in variables and hash the password
$email = $_POST['email'];
$password = hash('sha512', $_POST['password']);


//set up and run the query
$sql = "SELECT id FROM Student WHERE email = '$email' AND password = '$password'";
$result = $res->query($sql);
//store the number of results in a variable
$count = $result -> rowCount();
//check if any matches found
if ($count == 1){
	//echo 'Logged in Successfully.';
	foreach  ($result as $row){
		//access the existing session created automatically by the server
		session_start();
		//take the user's id from the database and store it in a session variable
		$_SESSION['id'] = $row['id'];
		//redirect the user
		header("locaion:/mydb/index.php");
	}
}
else {
	echo 'Invalid Login';
}
$res = null;
?>
