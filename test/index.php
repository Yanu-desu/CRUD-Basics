<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 400px;">
            <h3 class="text-center mb-4">Login</h3>

            <form method="POST" action="login-submit.php">
                <!-- Error messages -->
                <?php 
                    if(isset($_GET['error'])) {
                        $error = $_GET['error'];
                        if ($error === "email") {
                            echo '<p class="text-danger text-center">Incorrect Email</p>';
                        } else if ($error === "password") {
                            echo '<p class="text-danger text-center">Incorrect Password</p>';
                        } else if ($error === "not_logged_in") {
                            echo '<p class="text-danger text-center">You must log in first</p>';
                        }
                    }
                ?>

                <!-- Email input -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="Email" type="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>

                <!-- Password input -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="Password" type="password" class="form-control" id="password" placeholder="Enter your password" required>
                </div>

                <button name="submit" type="submit" class="btn btn-primary w-100">Login</button>

                <p class="text-center mt-3">
                    Don't have an account? 
                    <a class="text-decoration-none" href="signup.php">Sign Up</a>
                </p>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
