<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include(__DIR__ . "/db.php");

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students(name, roll_no, phone, email)
            VALUES('$name','$roll','$phone','$email')";
    $conn->query($sql);

    header("Location: view_students.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h2>Add Student</h2>

    <form method="POST" class="form-box">

        <div class="input-group">
            <label>Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="input-group">
            <label>Roll No</label>
            <input type="text" name="roll" required>
        </div>

        <div class="input-group">
            <label>Phone</label>
            <input type="text" name="phone" required>
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <button type="submit" name="save" class="btn-submit">Save Student</button>
    </form>

    <br>
    <a href="dashboard.php" class="btn-back">Back</a>
</div>

</body>
</html>