<?php include 'header.php'; ?>
<?php include 'dbcon.php'; ?>

    <?php 
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
    
            $query = "SELECT * FROM T1 WHERE 'id'=$id";
            $result = mysqli_query($conn, $query);

            if(!$result) {
                die("Query Failed". mysqli_error($conn));
            }
            else {

              $row = mysqli_fetch_assoc($result);
    
    }
  }
    ?>

    <?php
    
    if (isset($_POST['update'])) {

      if (isset($_GET['id_new'])) {
        $idnew = $_GET['id_new'];
      }
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $Email = $_POST['Email'];
    
        $query = "UPDATE T1 SET FirstName = '$FirstName', LastName = 
        '$LastName', Email = '$Email' WHERE id = '$idnew'";

        $result = mysqli_query($conn, $query);

        if(!$result) {
                die("Query Failed". mysqli_error($conn));
            }
            else {
                header("Location: index.php?update_msg=Data Updated Successfully");
            }

      }
    
    
    ?>









    <form action="update_page1.php?id_new=<?php echo $id; ?>" method="post">
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
        <input type="submit" class="btn btn-success" name="update" value="Confirm">
    </form>


<?php include 'footer.php'; ?>