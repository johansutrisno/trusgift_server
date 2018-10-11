<?php 
	require_once('../Connection.php');

	$sql_get_hastag = "select hashtag from hashtag";
	$result = mysqli_query($con, $sql_get_hastag);

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo $row["hashtag"];
		}
	} else {
		echo "0 result";
	}

?>