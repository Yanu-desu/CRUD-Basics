<?php
// Start the session
session_start();

// If no user is logged in, redirect to login
if(!isset($_SESSION['user'])) {
    header("Location: index.php?error=not_logged_in");
    exit();
}
?>
