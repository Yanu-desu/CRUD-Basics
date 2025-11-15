<?php include 'header.php'; ?>
<?php include 'dbcon.php'; ?>


    <div class="box1">
        <h2> All Students </h2>
        <form action="add.php" method="post">
    <button class="btn btn-primary">Add Yourself!</button>
</form>

    </div>



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
            $query = "SELECT * FROM T1";
            $result = mysqli_query($conn, $query);

            if(!$result) {
                die("Query Failed". mysqli_error($conn));
            }
            else {

            while($row = mysqli_fetch_assoc($result)){
              ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['FirstName']; ?></td>
                <td><?php echo $row['LastName']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><a href="update_page1.php?id=<?php echo $row['id']; ?>"  
                class="btn btn-primary"> Update </a></td>
                <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" 
                class="btn btn-danger"> Delete </a></td>
              </tr>
              <?php
            }
            }
            ?>
        </tbody>
    </table>

<?php 


if(isset($_GET['msg'])){
    echo "<h6>" . $_GET['msg'] . "</h6>";
}

?>

<?php 

if(isset($_GET['insert_msg'])){
    echo "<h6 style='color:green'>" . $_GET['insert_msg'] . "</h6>";
}

?>

<?php 

if(isset($_GET['update_msg'])){
    echo "<h6 style='color:green'>" . $_GET['update_msg'] . "</h6>";
}

?>

<?php 

if(isset($_GET['delete_msg'])){
    echo "<h6 style='color:green'>" . $_GET['delete_msg'] . "</h6>";
}

?>



   <?php include 'footer.php'; ?>