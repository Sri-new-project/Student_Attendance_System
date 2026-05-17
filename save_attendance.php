<?php
include "db.php";

$date = $_POST['date'];
$status = $_POST['status'];

foreach($status as $student_id => $value){
    $conn->query("INSERT INTO attendance(student_id, date, status)
    VALUES('$student_id','$date','$value')");
}

header("Location: dashboard.php");
?>