<?php
session_start();
require '../connect.php';


/* =========================
   ADD Instructor
========================= */
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $qualifications = $_POST['qualifications'];

    mysqli_query(
        $connect,
        "INSERT INTO instructors (name, role, qualifications)
         VALUES ('$name', '$role', '$qualifications')"
    );
}

/* =========================
   DELETE Instructor
========================= */
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($connect, "DELETE FROM instructors WHERE id = $id");
    header("Location: instructors.php");
    exit();
}

/* =========================
   FETCH Instructors
========================= */
$instructors = mysqli_query($connection, "SELECT * FROM instructors");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Instructors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- ADMIN NAVBAR -->
<nav>
    <a href="dashboard.php">Dashboard</a>
    <a href="instructors.php">Instructors</a>
    <a href="classes.php">Classes</a>
    <a href="plans.php">Pricing</a>
    <a href="logout.php">Logout</a>
</nav>

<!-- PAGE CONTENT -->
<div class="container">
    <h2>Manage Instructors</h2>

    <!-- ADD FORM -->
    <form method="POST">
        <input type="text" name="name" placeholder="Instructor Name" required>
        <input type="text" name="role" placeholder="Role (e.g. Head Coach)" required>
        <input type="text" name="qualifications" placeholder="Qualifications" required>
        <button type="submit" name="add">Add Instructor</button>
    </form>

    <!-- INSTRUCTORS TABLE -->
    <table>
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Qualifications</th>
            <th>Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($instructors)): ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['role'] ?></td>
            <td><?= $row['qualifications'] ?></td>
            <td>
                <a href="instructors.php?delete=<?= $row['id'] ?>"
                   style="color:#aa1313;"
                   onclick="return confirm('Are you sure you want to delete this instructor?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
