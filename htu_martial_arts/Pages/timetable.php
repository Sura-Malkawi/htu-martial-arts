<?php
    require 'connect.php';
    session_start();

    $sql = "SELECT * FROM timetable ORDER BY start_Time ASC";
    $result = mysqli_query($connection, $sql);

    $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

    $timetable = array();
    $rowsCount = mysqli_num_rows($result);

    for ($r = 0; $r < $rowsCount; $r++) 
    {
        $row = mysqli_fetch_assoc($result);

        $time = $row['start_Time'] . " - " . $row['end_Time'];

        if (!isset($timetable[$time])) 
        {
            for ($i = 0; $i < 7; $i++) {
                $timetable[$time][$i] = "-";
            }
        }

        for ($i = 0; $i < 7; $i++) 
        {
            if ($days[$i] == $row['class_Day']) 
            {
                if ($timetable[$time][$i] == "-") 
                {
                    $timetable[$time][$i] = $row['class_Name'];
                } 
                else 
                    {
                    $timetable[$time][$i] .= "<br>" . $row['class_Name'];
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable | H.T.U Martial Arts</title>
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

    <section id="timetable">
        <h1>Martial Arts Class Timetable</h1>
        <p class="subtitle">Weekly training schedule</p>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        <th>Sunday</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        foreach ($timetable as $time => $row) 
                        {
                            echo "<tr>";
                            echo "<td>$time</td>";

                            for ($i = 0; $i < 7; $i++) 
                                {
                                echo "<td>{$row[$i]}</td>";
                            }

                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
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