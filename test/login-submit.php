<?php
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = $_POST['Password'];

    // 1️⃣ Check initial table for login
    $sql = "SELECT * FROM initial WHERE Email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $dbpassword = $user['Password']; // hashed password

        // 2️⃣ Verify password securely
        if (password_verify($password, $dbpassword)) {

            $login_id = $user['id']; // id from initial table

            // 3️⃣ Fetch corresponding ea row(s)
            $sql_ea = "SELECT * FROM ea WHERE id_fk = ?";
            $stmt_ea = mysqli_prepare($conn, $sql_ea);
            mysqli_stmt_bind_param($stmt_ea, "i", $login_id);
            mysqli_stmt_execute($stmt_ea);
            $result_ea = mysqli_stmt_get_result($stmt_ea);

            $ea_data = mysqli_fetch_all($result_ea, MYSQLI_ASSOC); // all ea rows for this user

            // 4️⃣ Start session and store user + ea info
            session_start();
            $_SESSION['user'] = $user;
            $_SESSION['ea'] = $ea_data;

            header("Location: table.php");
            exit();
        } else {
            header("Location: index.php?error=password");
            exit();
        }
    } else {
        header("Location: index.php?error=email");
        exit();
    }
}
?>
