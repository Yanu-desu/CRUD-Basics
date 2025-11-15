<?php       
$conn = mysqli_connect("localhost", "root", "", "test");


if (isset($_POST['add'])) {
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
}

   if($FirstName == "" || empty($FirstName) ||$LastName == "" || empty($LastName) || $Email == "" ||   
    empty($Email) )
    {
        header("Location: table.php?msg=Please fill all the fields");
   }
    else {  
    $query = "INSERT INTO T1 (FirstName, LastName, Email) VALUES ('$FirstName', '$LastName', '$Email')";

    $result = mysqli_query($conn, $query);

    
    
    if(!$result) {
        die("Query Failed". mysqli_error($conn));
    } else {
        header("Location: table.php?insert_msg=Data Inserted Successfully");
    }   
    
}

    
?>