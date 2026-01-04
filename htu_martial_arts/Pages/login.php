<?php
    require 'connect.php';
    session_start();

    if(isset($_POST['submitButton']))
    {
        $user_EmailAddress = $_POST['user_EmailAddress'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE user_EmailAddress = '$user_EmailAddress' AND password = '$password';";

        $result = mysqli_query($connection, $sql);

        $loggedinUser = mysqli_fetch_assoc($result);

        if($loggedinUser)
        {
            $_SESSION['user'] = $user_EmailAddress;
            header("Location: index.php");
        } 
        else 
        {
            echo "Invalide Username or Password";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | H.T.U Martial Arts</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../Style/style2.css">
</head>
<body>

    <section class="login-page">

        <img src="../Asset/Login.png" alt="Martial Arts Background" class="image">

        <a href="index.php" class="home">
            <i class="fa-solid fa-house"></i>
        </a>

        <div class="login-content">

           <h1 class="gym-name">H.T.U Martial Arts</h1>
        

            <div class="login-box">
                <h1> Login </h1>

                <form action = "" method = "POST">
                    <label>Email</label>
                    <input type="email" name = "user_EmailAddress" placeholder="Enter your email" required class="email-input">

                    <label>Password</label>
                    <input  type="password" name = "password" placeholder="Enter your password" required class="password-input">

                    <a href="#" class="forgotPassword">Forgot your password?</a>

                    <button type="submit" id = "submitButton" name = "submitButton">Login</button>
                </form>

                <p class="signup-text">
                    Don't have an account?
                    <a href="signup.php">Sign up</a>
                </p>
            </div>
        </div>
        <p class="copyright">
            © 2025 H.T.U Martial Arts. All Rights Reserved.
        </p>
    </section>
</body>
</html>