<?php       

if (isset($_POST['add'])) {
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];

    $query = "INSERT INTO T1 (FirstName, LastName, Email) VALUES ('$FirstName', '$LastName', '$Email')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Insertion Failed");
    } else {
        header("Location: index.php");
    }
}

?>