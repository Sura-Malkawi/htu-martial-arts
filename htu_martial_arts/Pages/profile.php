<?php
    require 'connect.php';
    session_start();

    if (!isset($_SESSION['user'])) 
    {
        header("Location: login.php");
    }

    $userEmail = $_SESSION['user'];

    $userQuery = "SELECT * FROM users WHERE user_EmailAddress = '$userEmail'";
    $userResult = mysqli_query($connection, $userQuery);
    $user = mysqli_fetch_assoc($userResult);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile | H.T.U Martial Arts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="../Style/style.css">
</head>
<body>

<header>
    <img id="logo-img" src="../Asset/H.T.U.png" alt="logo">
    <nav>
        <a href="index.php"> Home </a>
        <a href="aboutus.php"> About Us </a>
        <a href="classes.php"> Classes </a>
        <a href="pricing.php"> Pricing </a>
        <a href="timetable.php">Timetable </a>
        <a href="profile.php"> Profile </a>
    </nav>
</header>

<section id="classes-membership">
    <h1>My Profile</h1>
    <p class="subtitle">Manage your current profile and subscription</p>

    <div class="account-box">

        <div class="user-info">
            <h2>User Information</h2>
            <p><strong>Full Name:</strong> <?php echo $user['full_Name']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['user_EmailAddress']; ?></p>
            <p><strong>Phone Number:</strong> <?php echo $user['phoneNumber']; ?></p>
        </div>

        <div class="membership">
            <h2>Membership Information</h2>
            <?php
                if ($user['membership_name']) 
                {
                    echo "<p><strong>Plan:</strong> {$user['membership_name']}</p>
                    <p><strong>Details:</strong> {$user['membership_description']}</p>
                    <p><strong>Price:</strong> {$user['membership_price']} JD</p>";
                }
                else 
                {
                    echo "<p>You are not subscribed to any plan yet.</p>";
                }
            ?>
            <button class="btn change" onclick="location.href='pricing.php'"> Change Plan </button>
            <button class="btn cancel" onclick="confirmCancel()"> Cancel Membership </button>

        </div>
    </div>
    <a href="logout.php" class="logout-btn">Logout</a>
</section>

<section class = "contact-us">
        <img src="../Asset/H.T.U.png" alt="logo"  width="50px" height="50px">

        <div class="details1">
            <h2> Contact Us </h2>
            <ul>
                <li>Email: HTUMrtialArts@gmail.com</li>
                <li>Phone: +962 79 539 3043</li>
                <li>Address: Amman, Jordan</li>
            </ul>
        </div>

        <div class="details2"> <h2> Opening Hours </h2>
            <ul>
                <li> Saturday - Thursday: 9:00 AM - 9:00 PM </li>
                <li> Friday: Closed </li>
            </ul>
        </div>
            
        <div class="social-icons">
            <a href="https://www.facebook.com/sura.malkawi.58/"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/sura_omarr/"><i class="fa-brands fa-instagram"></i></a>
        </div>
    </section>
    
    <footer class="footer">
        <p>© 2025 H.T.U Martial Arts. All Rights Reserved.</p>
    </footer>
</body>
</html>