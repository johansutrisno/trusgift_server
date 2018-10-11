<?php
	require_once('../Connection.php');

	$idUser = $_GET['id'];
	$idRedeem = $_GET['redeem'];
	$date = date("Y/m/d");

	$sql_insert_historyredeem = "INSERT INTO history_redeem(date_transaction, id_reward, id_user) 
		VALUES ('$date', '$idRedeem', '$idUser')";

	$sql_update_poinusers = "UPDATE user, reward 
		SET user.poin=user.poin-reward.reward_point, user.history=user.history+1
		WHERE user.id_user='$idUser' AND reward.id_reward='$idRedeem' AND user.poin-reward.reward_point>-1";

	mysqli_query($con, $sql_update_poinusers);

	if (mysqli_affected_rows($con)>0){
		mysqli_query($con, $sql_insert_historyredeem);
		if (mysqli_affected_rows($con)>0) {
			echo 1;
			exit();
		} else echo 0;
	} else {
		echo 0;
	}
	
	mysqli_close($con);
?>