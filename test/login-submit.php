<?php 
    $email = $_POST['email'];
	$password = $_POST['password'];

	include "dbconn.php";

	$sql = "SELECT * FROM accounts WHERE email = '$email'";
	$query = mysqli_query($conn, $sql);

	$result = mysqli_num_rows($query);
	if ($result > 0) {
		$data = mysqli_fetch_assoc($query);
		$dbpassword = $data['Password'];

		if ($password == $dbpassword) {
			header("Location: table.php");
		} else {
			header("Location: index.php?error=password");
		}
	} else {
		header("Location: index.php?error=email");
	}
 ?>