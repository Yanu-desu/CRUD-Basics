<?php

	$servername = "sql108.infinityfree.com";
	$username = "if0_40417084";
	$password = "Yanusans";
	$dbname = "if0_40417084_login";


	$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

?>