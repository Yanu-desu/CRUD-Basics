<?php include 'header.php'; ?>
<?php include 'dbcon.php'; ?>


    <div class="box1">
        <h2> All Students </h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add Yourself! </button>
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


<form action="insert.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Enter your Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="FirstName">First Name</label>
          <input type="text" class="form-control" name="FirstName" placeholder="Enter your first name">
        </div>
        <div class="form-group">
          <label for="LastName">Last Name</label>
          <input type="text" class="form-control" name="LastName" placeholder="Enter your last name">
        </div>
        <div class="form-group">
          <label for="Email">Email</label>
          <input type="email" class="form-control" name="Email" placeholder="Enter your email">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add" value="Confirm">
      </div>
    </div>
  </div>
</div>
 </form>

   <?php include 'footer.php'; ?>