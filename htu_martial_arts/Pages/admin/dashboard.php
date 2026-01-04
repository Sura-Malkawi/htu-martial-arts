<?php
    session_start();
    require '../connect.php';

    /* حماية الصفحة 
    if (!isset($_SESSION['admin'])) 
        {
        header("Location: login.php");
        exit();
    }*/

    /* إحصائيات */
    $totalUsers = mysqli_fetch_row(
        mysqli_query($connection, "SELECT COUNT(*) FROM users")
    )[0];

    $totalInstructors = mysqli_fetch_row(
        mysqli_query($connection, "SELECT COUNT(*) FROM instructors")
    )[0];

    $totalClasses = mysqli_fetch_row(
        mysqli_query($connection, "SELECT COUNT(*) FROM classes")
    )[0];

    $totalPlans = mysqli_fetch_row(
        mysqli_query($connection, "SELECT COUNT(*) FROM memberships")
    )[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
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

<!-- CONTENT -->
<div class="container">
    <h2>Dashboard</h2>

    <hr><br>

    <p><strong>Total Users:</strong> <?= $totalUsers ?></p>
    <p><strong>Total Instructors:</strong> <?= $totalInstructors ?></p>
    <p><strong>Total Classes:</strong> <?= $totalClasses ?></p>
    <p><strong>Pricing Plans:</strong> <?= $totalPlans ?></p>
</div>

</body>
</html>
