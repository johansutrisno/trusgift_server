<?php
	require_once('../Connection.php');

	$type = $_GET['type'];
	$id = $_GET['id'];
	$barcode = $_GET['barcode'];

	$sql_select_data = "SELECT * FROM product WHERE barcode='$barcode'";

	$sql_update_poin = "UPDATE user, point 
		SET user.poin=user.poin+point.point
		WHERE user.id_user='$id' AND point.id_point=2";

	$result_select_data = mysqli_query($con, $sql_select_data);

	if (mysqli_num_rows($result_select_data) > 0) {
		while ($row = mysqli_fetch_assoc($result_select_data)) {
			$idProduct = $row['id_product'];

			$sql_insert_history = "INSERT INTO history_scan (id_product, id_user) 
				VALUES ('$idProduct', '$id')";

			if (mysqli_query($con, $sql_insert_history)) {
				if (mysqli_query($con, $sql_update_poin)) echo "1";
				else echo "0";
			} else echo "0";
		}
	} else echo "0";
?>