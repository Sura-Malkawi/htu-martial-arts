<?php
    require 'connect.php';
    session_start();

    $sql = "SELECT * FROM classes";
    $result = mysqli_query($connection, $sql);
    $classes = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes | H.T.U Martial Arts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="../Style/style.css">
</head>
<body>
    <header>
        <img id = "logo-img" src="../Asset/H.T.U.png" alt="logo">
        
        <nav>
            <a href="index.php"> Home </a>
            <a href="aboutus.php"> About Us </a>
            <a href="classes.php"> Classes </a>
            <a href="pricing.php"> Pricing </a>
            <a href="timetable.php">Timetable </a>

            <?php
                if (isset($_SESSION['user'])) 
                {
                    echo '<a href="profile.php">Profile</a>';
                } 
                else 
                {
                    echo '<a href="login.php">Login</a>';
                }
            ?>
        </nav>
    </header>

    <section id="classes">
        <h1>Our Classes</h1>
        <p class="subtitle"> Explore our professional training programs </p>
        
        <?php
            if (isset($_SESSION['user'])) 
            {
                echo '<a href="pricing.php" class="choose-plan"> Choose a Plan</a>';
            } 
            else 
            {
                echo '<a href="login.php">Login</a>';
            }
        ?>

        <div class="cards-container">
            <?php
                foreach ($classes as $class) 
                {
                    $image = $class['class_image'];
                    $name = $class['class_Name'];
                    $description = $class['class_Description'];
                    $level = $class['level'];
                    $sessions = $class['sessions_per_week'];
                    $duration = $class['duration'];

                    echo "<div class='class-card' onclick='toggleCard(this)'>
                        <img src='../Asset/$image' alt='$name'>

                        <h3>$name</h3>
                        <p>$description</p>

                        <div class='details-hint'>
                            <span>Details</span>
                            <i class='fa-solid fa-angle-down'></i>
                        </div>

                        <div class='details'>
                            <p>Level: $level</p>
                            <p>Sessions: $sessions per week</p>
                            <p>Duration: $duration minutes</p>
                        </div>
                    </div>";
                }
            ?>

        </div>
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

<script src="../Script/classes.js"></script>
</body>
</html>