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
        </tr>
        </thead>
        <tbody>
            <?php 
            $query = "SELECT * FROM T1";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "</tr>";
            }
            ?>
        <tr>
        </tr>
        </tbody>
    </table>


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