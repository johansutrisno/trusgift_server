<?php  
	include '../Connection.php'; 
	$hasil         = mysqli_query($con, "SELECT * FROM reward") or die(mysql_error());
	$json_response = array();
	if(mysqli_num_rows($hasil)> 0){
		while ($row = mysqli_fetch_array($hasil)) {
			$json_response[] = $row;
		}
		echo json_encode(array('getReward' => $json_response));
	} 

	mysqli_close($con);
?>