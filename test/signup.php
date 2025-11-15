<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 400px;">
            <h3 class="text-center mb-4">Sign Up</h3>

            <form method="POST" action="signup-submit.php">
                <!-- First Name -->
                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input name="FirstName" type="text" class="form-control" id="firstName" placeholder="Enter your first name" required>
                </div>

                <!-- Last Name -->
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input name="LastName" type="text" class="form-control" id="lastName" placeholder="Enter your last name" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="Email" type="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="Password" type="password" class="form-control" id="password" placeholder="Enter your password" required>
                </div>

                <button name="submit" type="submit" class="btn btn-primary w-100">Sign Up</button>

                <p class="text-center mt-3">
                    Already have an account? 
                    <a class="text-decoration-none" href="index.php">Login</a>
                </p>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
