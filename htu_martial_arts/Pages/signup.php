<?php
    require 'connect.php';

    if (isset($_POST['signUpButton'])) 
    {
        $full_Name = $_POST['full_Name'];
        $user_EmailAddress = $_POST['user_EmailAddress'];
        $phoneNumber = $_POST['phoneNumber'];
        $password = $_POST['password'];

        $sql = "INSERT INTO users (full_Name, user_EmailAddress, phoneNumber, password) VALUES ('$full_Name', '$user_EmailAddress', '$phoneNumber', '$password');";

        $result = mysqli_query($connection, $sql);

        if ($result) 
        {
            header("Location: login.php");
        } 
        else 
        {
            mysqli_error($connection);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Signup | H.T.U Martial Arts </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../Style/style2.css">
</head>
<body>
    <section class="signup-page">

        <img src="../Asset/Login.png" alt="Martial Arts Background" class="image">

        <a href="index.html" class="home">
            <i class="fa-solid fa-house"></i>
        </a>

        <div class="signup-content">

            <h1 class="gym-name">H.T.U Martial Arts</h1>

            <div class="signup-box">
                <p class = "welcome">Create your account</p>

                <form action = "" method = "POST">
                    <label>Full Name</label>
                    <input type="text" name = "full_Name" placeholder="Enter your full name" required>

                    <label>Email</label>
                    <input type="email" name = "user_EmailAddress" placeholder="Enter your email" required>

                    <label>Phone Number</label>
                    <input type="tel" name="phoneNumber" placeholder="Enter your Phone Number" required>

                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>

                    <label>Confirm Password</label>
                    <input type="password" name="confirmPassword" placeholder="Confirm your password" required>

                    <button type="submit" id="signUpButton" name="signUpButton">Sign Up</button>
                </form>

                <p class="login">
                    Already have an account?
                    <a href="login.html">Login</a>
                </p>
            </div>
        </div>

        <p class="copyright">
            © 2025 H.T.U Martial Arts. All Rights Reserved.
        </p>
    </section>
        
</body>
</html>