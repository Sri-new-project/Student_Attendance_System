<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

include(__DIR__ . "/db.php");

$result = $conn->query("SELECT * FROM students");

if(!$result){
    die("Query Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Students List</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h2>Students List</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Roll No</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

        <?php while($row = $result->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['roll_no']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['email']; ?></td>

            <td>
                <a href="edit_student.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete_student.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this student?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <a href="dashboard.php">Back</a>
</div>

</body>
</html>