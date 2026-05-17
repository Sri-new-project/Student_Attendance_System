<?php
include "db.php";

$id = $_GET['id'];
$row = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $conn->query("UPDATE students SET 
        name='$name',
        roll_no='$roll',
        phone='$phone',
        email='$email'
        WHERE id=$id");

    header("Location: view_students.php");
}
?>

<form method="POST">
    Name: <input type="text" name="name" value="<?= $row['name'] ?>"><br>
    Roll: <input type="text" name="roll" value="<?= $row['roll_no'] ?>"><br>
    Phone: <input type="text" name="phone" value="<?= $row['phone'] ?>"><br>
    Email: <input type="text" name="email" value="<?= $row['email'] ?>"><br>

    <button name="update">Update</button>
</form>