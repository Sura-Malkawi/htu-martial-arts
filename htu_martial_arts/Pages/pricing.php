<?php
    require 'connect.php';
    session_start();

    $membershipsResult = mysqli_query($connection, "SELECT * FROM memberships");
    $memberships = mysqli_fetch_all($membershipsResult, MYSQLI_ASSOC);

    $coursesResult = mysqli_query($connection, "SELECT * FROM specialist_courses");
    $courses = mysqli_fetch_all($coursesResult, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing | H.T.U Martial Arts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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


    <main class="container my-5">
        <div class="text-center mb-5">
            <h1>Pricing & Membership</h1>
            <p>Choose the option that fits your training goals.</p>
        </div>

        <div class="row g-4">
            <?php
                foreach ($memberships as $membership) 
                {
                    $id = $membership['memberships_ID'];
                    $name = $membership['memberships_Name'];
                    $description = $membership['memberships_description'];
                    $price = $membership['memberships_price'];

                    echo "
                    <div class='col-sm-6 col-lg-4'>
                        <div class='card h-100 pricing-card'>
                            <div class='card-body text-center'>
                                <h5>$name</h5>
                                <p>$description</p>
                                <h6>$price JOD</h6>

                                <form method='post' action='subscribe.php' class='subscribe-form'>
                                    <input type='hidden' name='memberships_ID' value='$id'>
                                    <button type='submit' class='add-btn'>+</button>
                                </form>
                            </div>
                        </div>
                    </div>";
                }
            ?>
        </div>
    </main>


    <section class="specialist-courses">
        <h2>Specialist Courses & Fitness Training</h2>

        <table>
            <thead>
                <tr>
                    <th>Course / Service </th>
                    <th>Details </th>
                    <th>Price (JOD) </th>
                    <th>Subscribe </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($courses as $course) 
                    {
                        $id = $course['course_ID'];
                        $name = $course['course_Name'];
                        $details = $course['course_Details'];
                        $price = $course['course_Price'];

                        echo "
                        <tr>
                            <td>$name</td>
                            <td>$details</td>
                            <td>$price JOD</td>
                            <td>
                                <form method='post' action='subscribe.php'>
                                    <input type='hidden' name='course_ID' value='$id'>
                                    <button class='add-btn'>
                                        <i class='fa-solid fa-plus'></i>
                                    </button>
                                </form>
                            </td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../Script/pricing.js"></script>
</body>
</html>