<?php 
	#Data from form
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	include "dbconn.php";
	
	#Query
	$sql = "INSERT INTO accounts (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";
	$query = mysqli_query($conn, $sql);
	if ($query) {
    header("Location: index.php");
    exit();
	} else {
    echo "Error: " . mysqli_error($conn);
	}

 ?>