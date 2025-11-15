<?php
include 'dbcon.php'; // make sure $conn is defined

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $firstname = mysqli_real_escape_string($conn, $_POST['FirstName']);
    $lastname = mysqli_real_escape_string($conn, $_POST['LastName']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = $_POST['Password'];

    // Hash password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Start transaction to keep things safe
    mysqli_begin_transaction($conn);

    try {
        // 1️⃣ Insert into initial table
        $sql = "INSERT INTO initial (FirstName, LastName, Email, Password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $email, $hashed_password);
        mysqli_stmt_execute($stmt);

        // Get the ID of the newly inserted user
        $login_id = mysqli_insert_id($conn);

        // 2️⃣ Insert into ea table with foreign key
        $sql_ea = "INSERT INTO ea (id_fk, FName, LName, email) VALUES (?, ?, ?, ?)";
        $stmt_ea = mysqli_prepare($conn, $sql_ea);
        mysqli_stmt_bind_param($stmt_ea, "isss", $login_id, $firstname, $lastname, $email);
        mysqli_stmt_execute($stmt_ea);

        // Commit transaction
        mysqli_commit($conn);

        header("Location: index.php");
        exit();

    } catch (Exception $e) {
        mysqli_rollback($conn); // undo both inserts if something fails
        echo "Error: " . $e->getMessage();
    }
}
?>
