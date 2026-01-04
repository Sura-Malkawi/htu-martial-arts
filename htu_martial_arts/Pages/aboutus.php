<?php
    require 'connect.php';
    session_start();

    $sql = "SELECT * FROM instructors";
    $result = mysqli_query($connection, $sql);
    $instructors = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> About Us | H.T.U Martial Arts </title>

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

    <section class="about-hero">   
        <video autoplay muted loop>
            <source src="/Asset/video.mp4" type="video/mp4">
        </video>

        <div class="hero-text">
        <h1> About H.T.U Martial Arts </h1>
        <p>
            We provide fitness training, self-defence and martial arts programs for all ages and levels
            in a safe and supportive environment.
        </p>
        <p class="location-text">
            Amman, Jordan — King Hussein Business Park area. Easy access, secure surroundings
            and a welcoming atmosphere for students and families.
        </p>
        </div>
    </section>

    <section class="about-section">
        <div class="about-content"> 
            <div class="about-text">  
            <div class="about-card">
                <h2>Who We Are</h2>
                <p>
                    H.T.U Martial Arts is a training community in Amman focused on discipline,
                    confidence and strength. We help members improve fitness and skills
                    through structured programs and professional coaching.
                </p>
            </div>

            <div class="about-card">
                <h2>What We Offer</h2>
                <ul class="about-list">
                    <li><i class="fa-solid fa-check"></i> Martial Arts Training (Beginner to Advanced)</li>
                    <li><i class="fa-solid fa-check"></i> Fitness Training & Conditioning</li>
                    <li><i class="fa-solid fa-check"></i> Self-Defence Courses</li>
                    <li><i class="fa-solid fa-check"></i> Safe & Supportive Environment</li>
                </ul>
            </div>
        </div>
        

        <div class="about-images">
            <img src="../Asset/About1.png" alt="Training">
            <img src="../Asset/About2.png" alt="Martial Arts">
            <img src="../Asset/About3.png" alt="Fitness">
            <img src="../Asset/About4.png" alt="Self Defence">
        </div>
        </div> 
    </section>

    <section class="about-section mission-vision">
        <div class="about-details">
            <div class="about-card2">
                <h2>Our Mission</h2>
                <p>
                    To deliver high-quality training that develops discipline, strength, and confidence,
                    while supporting members with professional coaching and a respectful training culture.
                </p>
            </div>

            <div class="about-card2">
                <h2>Our Vision</h2>
                <p>
                    To become a leading martial arts and fitness hub in Amman by offering structured programs,
                    skilled instructors and an environment that welcomes all ages.
                </p>
            </div>
        </div>
    </section>

    <section class="about-instructor">
        <h2 class="section-instructor"> Meet Our Instructors </h2>

        <div class="instructors">
            <?php
                foreach ($instructors as $instructor) 
                {
                    $name = $instructor['instructor_Name'];
                    $job = $instructor['instructor_Job'];
                    $details = $instructor['instructor_Details'];
                    $image = $instructor['instructor_Image'];

                    echo "<div class='instructor-card'>
                        <img src='../Asset/$image' alt='$name'>

                        <h3>$name</h3>
                        <p>$job</p>

                        <div class='tooltip'>
                            $details
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

<script src="../Script/aboutus.js"></script>
</body>
</html>