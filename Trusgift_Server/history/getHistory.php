<?php
	include '../Connection.php'; 

	$idUser = $_GET['id'];

	$sql_get_history = "SELECT * 
		FROM history_redeem, user, reward 
		WHERE history_redeem.id_user=user.id_user 
			AND history_redeem.id_reward=reward.id_reward";

	$result = mysqli_query($con, $sql_get_history);

	$json_response = array();
	if (mysqli_num_rows($result)>0) {
		while ($row = mysqli_fetch_array($result)) {
			$json_response[] = $row;
		}
		echo json_encode(array('getReward' => $json_response));
	}

	mysqli_close($con);
?>