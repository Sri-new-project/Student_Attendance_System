<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <!-- ✅ Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <!-- ✅ CSS -->
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h1>Welcome to Students Attendance Dashboard</h1>
    <p>Class XII A</p>

    <!-- Navigation Buttons -->
    <div>
        <a href="add_student.php">Add Student</a>
        <a href="view_students.php">View Students</a>
        <a href="attendance.php">Mark Attendance</a>
        <a href="view_attendance.php">View Attendance</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

</body>
</html>