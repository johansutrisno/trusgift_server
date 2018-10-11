<?php
	//$id = $_GET['id'];
	$type = $_GET['type'];
	$id = $_GET['id'];
	$barcode = $_GET['barcode'];
	$poin;
	$tempPoin;
	
	//Importing database
	require_once('../Connection.php');
	
	//Make SQL Query select
	$sql_getpoin = "SELECT poin FROM user WHERE id_user='$id'";
	$sql_getbarcode = "SELECT * FROM product";
	
	//Get the result
	$result_getpoin = mysqli_query($con,$sql_getpoin);
	$result_getbarcode = mysqli_query($con, $sql_getbarcode);
	
	if (mysqli_num_rows($result_getpoin) > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($result_getpoin)) {
			//echo "poin: " . $row["poin"];
			$poin = $row["poin"];
		}
	} else {
		echo "0 results";
	}

	//Fill it into array
	$resultbarcode = array();
	$row = mysqli_fetch_array($result_getbarcode);
	array_push($resultbarcode,array(
			"id_product"=>$row['id_product'],
			"barcode"=>$row['barcode'],
			"poin"=>$row['poin']
		));

	if ($type == 1) {
		$tempPoin = $poin + 10;
	} elseif ($type == 2) {
		$tempPoin = $poin + 20;
	} else {
		$tempPoin = $poin + 30;
	}

	foreach ($resultbarcode as $key) {
		if ($barcode == $key['barcode']) {

			$tempPoin = $poin + $key['poin'];
			$tempIdProduct = $key['id_product'];

			$sql_updatepoint = "UPDATE user SET poin='$tempPoin' WHERE id_user='$id'";
			$sql_inserthistory = "INSERT INTO history_scan (id_product, id_user) VALUES ('$tempIdProduct', '$id')";

			$result = mysqli_query($con, $sql_updatepoint);
			$result_inserthistory = mysqli_query($con, $sql_inserthistory);

			if ($result == TRUE && $result_inserthistory == TRUE) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: ";
			}
		} else {
			echo "ga sama";
		}

		echo $key['barcode'];
	}
	
	mysqli_close($con);
?>

<?php
	//$id = $_GET['id'];
	$type = $_GET['type'];
	$id = $_GET['id'];
	$barcode = $_GET['barcode'];
	$poin;
	$tempPoin;
	$statusScan;
	
	//Importing database
	require_once('../Connection.php');
	
	//Make SQL Query select
	$sql_getpoin = "SELECT poin FROM user WHERE id_user='$id'";
	$sql_getbarcode = "SELECT * FROM product";
	
	//Get the result
	$result_getpoin = mysqli_query($con,$sql_getpoin);
	$result_getbarcode = mysqli_query($con, $sql_getbarcode);
	
	if (mysqli_num_rows($result_getpoin) > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($result_getpoin)) {
			//echo "poin: " . $row["poin"];
			$poin = $row["poin"];
		}
	} else {
		echo "0 results";
	}

	//Fill it into array
	$resultbarcode = array();
	$row = mysqli_fetch_array($result_getbarcode);
	array_push($resultbarcode,array(
			"id_product"=>$row['id_product'],
			"barcode"=>$row['barcode'],
			"poin"=>$row['poin']
		));

	$statusScan = statScan($con, $id);
	echo $statusScan;

	foreach ($resultbarcode as $key) {
		if ($barcode == $key['barcode'] && $statusScan == 1) {

			$tempPoin = $poin + $key['poin'];
			$tempIdProduct = $key['id_product'];

			$sql_updatepoint = "UPDATE user SET poin='$tempPoin' WHERE id_user='$id'";
			$sql_inserthistory = "INSERT INTO history_scan (id_product, id_user) VALUES ('$tempIdProduct', '$id')";

			$result = mysqli_query($con, $sql_updatepoint);
			$result_inserthistory = mysqli_query($con, $sql_inserthistory);

			if ($result == TRUE && $result_inserthistory == TRUE) echo 1;
			else echo 0;

		} else {
			echo "ga sama";
		}

		echo $statusScan . "<br>";

		echo $key['barcode'];
	}

	function statScan($con, $id) {
		$sql_gethistory = "SELECT * FROM history_scan WHERE id_user = '$id'";
		$result_gethistory = mysqli_query($con, $sql_gethistory);
		if (mysqli_num_rows($result_gethistory) > 0) return 0;
		else return 1;
	}
	
	mysqli_close($con);
?>


<selector xmlns:android="http://schemas.android.com/apk/res/android">
    <!--<item android:state_pressed="true">
        <layer-list>
            <item android:left="4dp" android:top="4dp">
                <shape>
                    <solid android:color="#35000000" />
                    <corners android:radius="2dp"/>
                </shape>
            </item>
            ...
        </layer-list>
    </item>-->
    <item>
        <layer-list>
            <!-- SHADOW LAYER -->
            <!--<item android:top="4dp" android:left="4dp">
                <shape>
                    <solid android:color="#35000000" />
                    <corners android:radius="2dp" />
                </shape>
            </item>-->
            <!-- SHADOW LAYER -->
            <item>
                <shape>
                    <solid android:color="#35000000" />
                    <corners android:radius="2dp" />
                </shape>
            </item>
            <!-- CONTENT LAYER -->
            <item android:bottom="3dp" android:left="1dp" android:right="3dp" android:top="1dp">
                <shape>
                    <solid android:color="#ffffff" />
                    <corners android:radius="1dp" />
                </shape>
            </item>
        </layer-list>
    </item>
</selector>