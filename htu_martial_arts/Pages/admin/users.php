<?php
session_start();
require '../connect.php';


$result = mysqli_query($connection, "SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<body>

<nav>
    <a href="dashboard.php">Dashboard</a> |
    <a href="users.php">Users</a> |
    <a href="plans.php">Plans</a> |
    <a href="classes.php">Classes</a> |
    <a href="timetable.php">Timetable</a> |
    <a href="logout.php">Logout</a>
</nav>

<h2>Users</h2>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
</tr>

<?php while ($u = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= $u['full_Name'] ?></td>
    <td><?= $u['user_EmailAddress'] ?></td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>
