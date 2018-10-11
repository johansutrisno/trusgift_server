<?php  
	//Get value of id variable
	$id = $_GET['id'];
	//$id = "10746633964766914003";
	
	//Importing database
	require_once('../Connection.php');
	
	//Make SQL Query select
	$sql = "SELECT * FROM user WHERE id_user='$id'";
	
	//Get the result
	$r = mysqli_query($con,$sql);
	
	//Fill it into array
	$result = array();
	$row = mysqli_fetch_array($r);
	array_push($result,array(
			"id_user"=>$row['id_user'],
			"username"=>$row['username'],
			"email"=>$row['email'],
			"poin"=>$row['poin'],
			"history"=>$row['history'],
			"profile_picture"=>$row['profile_picture']
		));

	//Show in JSON Format
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>