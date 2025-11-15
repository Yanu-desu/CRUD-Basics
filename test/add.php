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
        <div class="card shadow p-4" style="width: 400px;">
            <h3 class="text-center mb-4">Add Yourself</h3>

            <form action="insert.php" method="POST">
                <!-- First Name -->
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="FirstName" placeholder="Enter your first name" required>
                </div>

                <!-- Last Name -->
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="LastName" placeholder="Enter your last name" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="Email" placeholder="Enter your email" required>
                </div>

                <!-- Submit button -->
                <button type="submit" name="add" class="btn btn-primary w-100">
                    Submit
                </button>
            </form>

            <!-- Optional link -->
            <p class="text-center mt-3">
                Already have an account? <a href="login.php" class="text-decoration-none">Login</a>
            </p>
        </div>
    </div>
</body>
</html>
