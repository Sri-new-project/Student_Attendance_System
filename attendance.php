<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include(__DIR__ . "/db.php");

$students = $conn->query("SELECT * FROM students");

if(!$students){
    die("Query Failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mark Attendance</title>

    <!-- ✅ Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <!-- ✅ CSS -->
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h2>Mark Attendance</h2>

    <form method="POST" action="save_attendance.php">

        <input type="date" name="date" required><br><br>

        <table>
            <tr>
                <th>Name</th>
                <th>Roll</th>
                <th>Present</th>
                <th>Absent</th>
            </tr>

            <?php while($s = $students->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $s['name']; ?></td>
                <td><?php echo $s['roll_no']; ?></td>

                <td>
                    <input type="radio" name="status[<?php echo $s['id']; ?>]" value="Present" required>
                </td>

                <td>
                    <input type="radio" name="status[<?php echo $s['id']; ?>]" value="Absent" required>
                </td>
            </tr>
            <?php } ?>

        </table>

        <br>
        <button type="submit">Save Attendance</button>
    </form>

    <br>
    <a href="dashboard.php">Back</a>
</div>

</body>
</html>