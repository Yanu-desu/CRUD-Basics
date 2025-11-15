<?php include 'auth.php'; ?>
<?php
include 'dbcon.php';
session_start();

if(!isset($_SESSION['user'])){
    header("Location: index.php?error=not_logged_in");
    exit();
}

$login_id = $_SESSION['user']['id']; // logged-in user ID

if(isset($_GET['id'])){
    $id_t = intval($_GET['id']); // sanitize input

    // 1️⃣ Delete only if the row belongs to this user
    $sql = "DELETE FROM ea WHERE id_t = ? AND id_fk = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $id_t, $login_id);

    if(mysqli_stmt_execute($stmt)){
        // 2️⃣ Remove from session so table.php updates immediately
        if(isset($_SESSION['ea'])){
            foreach($_SESSION['ea'] as $key => $ea_row){
                if($ea_row['id_t'] == $id_t){
                    unset($_SESSION['ea'][$key]);
                    break;
                }
            }
            // Reindex the array
            $_SESSION['ea'] = array_values($_SESSION['ea']);
        }

        header("Location: table.php?delete_msg=Data Deleted Successfully");
        exit();
    } else {
        die("Error deleting record: " . mysqli_error($conn));
    }
}
?>
