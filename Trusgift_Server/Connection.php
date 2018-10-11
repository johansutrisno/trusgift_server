<?php 
	//Define constant
	 define('HOST','localhost');
	 define('USER','root');
	 define('PASS','');
	 define('DB','db_marketing');
	 
	 //Create connection to database
	 $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
?>