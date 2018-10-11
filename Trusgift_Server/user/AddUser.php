<?php  
	if($_SERVER['REQUEST_METHOD']=='POST'){
		// Default point first register
		$poin = 100;
		
		// Get value of variable
		$idUser = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$history = $_POST['history'];
		$profpic = $_POST['profpic'];
		$date_register = date('m/d/Y h:i:s', time());

		// Create SQL Syntax
		$sql = "INSERT INTO user(id_user, username,email,poin, history, profile_picture, date_register) VALUES ('$idUser','$name','$email','$poin', '$history', '$profpic', NOW())";
		
		// Import connection file Database
		require_once('../Connection.php');
		
		// Execute the database query
		if(mysqli_query($con,$sql)){
			echo 'Welcome';
		}else{
			echo 'Welcome';
		}
		
		mysqli_close($con);
	}

?>