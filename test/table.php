<?php include 'auth.php'; ?>
<?php include 'header.php'; ?>
<?php session_start(); ?>

<div class="box1 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">
    <h2 class="mb-2 mb-md-0">All Your Femboy Twink Nerds UwU~</h2>
    <!-- Logout button -->
    <form action="logout.php" method="post" style="margin:0;">
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>

<div class="mb-3">
    <form action="add.php" method="post">
        <button class="btn btn-primary">Add Yourself!</button>
    </form>
</div>

<!-- Responsive table wrapper -->
<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped"> 
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if(isset($_SESSION['ea']) && !empty($_SESSION['ea'])) {
                foreach($_SESSION['ea'] as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['id_t']; ?></td>
                        <td><?php echo $row['FName']; ?></td>
                        <td><?php echo $row['LName']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><a href="update_page1.php?id=<?php echo $row['id_t']; ?>" class="btn btn-primary btn-sm">Update</a></td>
                        <td><a href="delete_page.php?id=<?php echo $row['id_t']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>No records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php 
// Messages
$messages = ['msg', 'insert_msg', 'update_msg', 'delete_msg'];
foreach($messages as $m) {
    if(isset($_GET[$m])) {
        $color = $m === 'msg' ? 'black' : 'green';
        echo "<h6 style='color:{$color}'>" . htmlspecialchars($_GET[$m]) . "</h6>";
    }
}
?>

<?php include 'footer.php'; ?>
