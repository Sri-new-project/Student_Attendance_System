<?php
session_start();

// If user is NOT logged in, redirect to login page
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>