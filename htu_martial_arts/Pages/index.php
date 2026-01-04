<?php
    require 'connect.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> H.T.U Martial Arts </title>
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

    <section class = "hero">
            <img id = "welcome-img" src="../Asset/WelcomePhoto.png" alt="Welcome image"/>
            
            <div class = "hero-content">
            <h2> Welcome To </h2>
            <h1> H.T.U Martial Arts </h1>
            <p> Professional martial arts, fitness training and self-defence classes for all levels </p>
            <div class = "hero-buttons">
                <a href="classes.php"> View Classes </a>
                
                <?php
                    if (!isset($_SESSION['user'])) 
                    {
                        echo '<a href="login.php">Join Now</a>';
                    }
                ?>
            </div>
        </div>
    </section>


    <section class = "why-us">
        <div class="why-images">
            <img src="../Asset/Why1.png" alt="Training">
            <img src="../Asset/Why2.png" alt="Martial Arts">
            <img src="../Asset/Why3.png" alt="Fitness">
            <img src="../Asset/Why4.png" alt="Training">
        </div>

        <div class = "why-text">
            <h2> Why Choose Us </h2>
            <p>
                H.T.U Martial Arts offers professional training programs led by certified instructors
                in a safe and supportive environment that encourages discipline, strength, and personal
                growth. Located in a central area of Amman, the gym provides a family-friendly atmosphere
                for all ages, allowing members to develop skills, stay active, and become part of a
                positive and secure training community
            </p>
        </div>
    </section>

    <section class="programs">
        <h2>Our Programs</h2>

        <div class="program-cards">
            <div class="program-card">
                <i class="fa-solid fa-people-arrows"></i>
                <h3> Martial Arts Training </h3>
                <p> Structured martial arts programs focused on discipline, technique and strength </p>
            </div>

            <div class="program-card">
                <i class="fa-solid fa-dumbbell"></i>
                <h3> Fitness Training </h3>
                <p> Professional fitness sessions designed to improve endurance and overall health </p>
            </div>

            <div class="program-card">
                <i class="fa-solid fa-shield-halved"></i>
                <h3> Self-Defence Courses </h3>
                <p> Practical self-defence classes that build confidence and personal safety skills </p>
            </div>
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

</body>
</html>