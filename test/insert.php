<?php include 'auth.php'; ?>
<?php
include 'dbcon.php';
session_start(); // need session to get logged-in user

if(isset($_POST['add'])) {

    if(!isset($_SESSION['user'])) {
        // User not logged in, redirect to login page
        header("Location: index.php?error=not_logged_in");
        exit();
    }

    $login_id = $_SESSION['user']['id']; // logged-in user's ID

    $firstname = mysqli_real_escape_string($conn, $_POST['FirstName']);
    $lastname  = mysqli_real_escape_string($conn, $_POST['LastName']);
    $email     = mysqli_real_escape_string($conn, $_POST['Email']);

    // Insert into ea table linked to the logged-in user
    $sql = "INSERT INTO ea (id_fk, FName, LName, email) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "isss", $login_id, $firstname, $lastname, $email);

    if(mysqli_stmt_execute($stmt)) {
        // Optional: update session with new ea row
        $new_ea_id = mysqli_insert_id($conn);
        $_SESSION['ea'][] = [
            'id_t' => $new_ea_id,
            'id_fk' => $login_id,
            'FName' => $firstname,
            'LName' => $lastname,
            'email' => $email
        ];

        header("Location: table.php?insert_msg=Added successfully!");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
