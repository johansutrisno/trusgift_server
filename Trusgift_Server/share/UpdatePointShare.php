<?php
	require_once('../Connection.php');
	$idUser = $_GET['id'];

	$sql_update_poin = "UPDATE user
		INNER JOIN point
		ON point.id_point = 4
		SET user.poin=user.poin+point.point
		WHERE user.id_user='$idUser'";
	$result = mysqli_query($con, $sql_update_poin);

	if ($result) {
		echo "1";
	} else {
		echo "0";
	}
?>