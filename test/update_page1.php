<?php include 'auth.php'; ?>
<?php include 'header.php'; ?>
<?php include 'dbcon.php'; ?>
<?php 
session_start();

if(!isset($_SESSION['user'])){
    header("Location: index.php?error=not_logged_in");
    exit();
}

$login_id = $_SESSION['user']['id'];

// 1️⃣ Get the row to update
if (isset($_GET['id'])) {
    $id_t = intval($_GET['id']); // sanitize

    $sql = "SELECT * FROM ea WHERE id_t = ? AND id_fk = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $id_t, $login_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<p class='text-danger'>Record not found or you don't have permission.</p>";
        exit();
    }
}

// 2️⃣ Handle form submission
if(isset($_POST['update'])){
    $firstname = mysqli_real_escape_string($conn, $_POST['FirstName']);
    $lastname  = mysqli_real_escape_string($conn, $_POST['LastName']);
    $email     = mysqli_real_escape_string($conn, $_POST['Email']);

    $sql_update = "UPDATE ea SET FName = ?, LName = ?, email = ? WHERE id_t = ? AND id_fk = ?";
    $stmt_update = mysqli_prepare($conn, $sql_update);
    mysqli_stmt_bind_param($stmt_update, "sssii", $firstname, $lastname, $email, $id_t, $login_id);

    if(mysqli_stmt_execute($stmt_update)){
        // update session so table.php shows latest data
        foreach($_SESSION['ea'] as &$ea_row){
            if($ea_row['id_t'] == $id_t){
                $ea_row['FName'] = $firstname;
                $ea_row['LName'] = $lastname;
                $ea_row['email'] = $email;
                break;
            }
        }

        header("Location: table.php?update_msg=Data Updated Successfully");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!-- 3️⃣ Update form -->
<div class="container mt-4">
    <h3>Update Your Info</h3>
    <form action="update_page1.php?id=<?php echo $id_t; ?>" method="post">
        <div class="form-group mb-3">
            <label for="FirstName">First Name</label>
            <input type="text" class="form-control" name="FirstName" value="<?php echo htmlspecialchars($row['FName']); ?>" required>
        </div>
        <div class="form-group mb-3">
            <label for="LastName">Last Name</label>
            <input type="text" class="form-control" name="LastName" value="<?php echo htmlspecialchars($row['LName']); ?>" required>
        </div>
        <div class="form-group mb-3">
            <label for="Email">Email</label>
            <input type="email" class="form-control" name="Email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
        </div>
        <input type="submit" class="btn btn-success" name="update" value="Confirm">
    </form>
</div>

<?php include 'footer.php'; ?>
