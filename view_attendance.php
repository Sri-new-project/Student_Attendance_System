<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include(__DIR__ . "/db.php");

$date = "";
$result = null;

if(isset($_POST['search'])){
    $date = $conn->real_escape_string($_POST['date']);

    $sql = "SELECT students.name, students.roll_no, attendance.status
            FROM attendance
            JOIN students ON attendance.student_id = students.id
            WHERE attendance.date = '$date'";

    $result = $conn->query($sql);

    if(!$result){
        die("Query Error: " . $conn->error);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Attendance</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h2>View Attendance</h2>

    <form method="POST">
        <label>Select Date:</label><br>
        <input type="date" name="date" required>
        <button type="submit" name="search">View</button>
    </form>

    <br>

    <?php if($result && $result->num_rows > 0){ ?>

        <h3>Attendance for: <?php echo $date; ?></h3>

        <table>
            <tr>
                <th>Name</th>
                <th>Roll No</th>
                <th>Status</th>
            </tr>

            <?php while($row = $result->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['roll_no']; ?></td>

                <td class="<?php echo (trim($row['status'])=='Present') ? 'present' : 'absent'; ?>">
                    <?php echo $row['status']; ?>
                </td>
            </tr>
            <?php } ?>

        </table>

    <?php } elseif($result){ ?>
        <p>No attendance found for this date.</p>
    <?php } ?>

    <br>
    <a href="dashboard.php">Back</a>
</div>

</body>
</html>