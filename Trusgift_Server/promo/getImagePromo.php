<?php  
	
	//Importing database
	require_once('../Connection.php');
	
	 $hasil         = mysqli_query($con, "SELECT `promo_img` FROM `promo`") or die(mysqli_error());
	 $json_response = array();
	 if(mysqli_num_rows($hasil)> 0){
	 	while ($row = mysqli_fetch_array($hasil)) {
	 		$json_response[] = $row;
	 	}
	 	echo json_encode(array('getPromo' => $json_response));
	 }

	 mysqli_close($con);
?>