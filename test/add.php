<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Yourself</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 400px;">
            <h3 class="text-center mb-4">Enter your Details</h3>
            <form method="POST" action="insert.php">
                <div class="mb-3">
                    <label for="FirstName" class="form-label">First Name</label>
                    <input name="FirstName" type="text" class="form-control" id="FirstName" placeholder="Enter your first name">
                </div>
                <div class="mb-3">
                    <label for="LastName" class="form-label">Last Name</label>
                    <input name="LastName" type="text" class="form-control" id="LastName" placeholder="Enter your last name">
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input name="Email" type="Email" class="form-control" id="Email" placeholder="Enter your email">
                </div>
                <button name="add" type="submit" class="btn btn-primary w-100">Submit</button>
                <br><br>
                <p><center>Go back?<a class="text-decoration-none m-2" href="table.php">Exit</a></p>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
