<?php
    require 'connect.php';
    session_start();

    if (!isset($_SESSION['user'])) 
    {
        header("Location: login.php");
    }

    $userEmail = $_SESSION['user'];

    if (isset($_POST['memberships_ID'])) 
    {
        $membershipID = $_POST['memberships_ID'];

        $membershipQuery = "SELECT * FROM memberships WHERE memberships_ID = '$membershipID'";
        $membershipResult = mysqli_query($connection, $membershipQuery);
        $membership = mysqli_fetch_assoc($membershipResult);

        if ($membership) 
        {
            $name = $membership['memberships_Name'];
            $description = $membership['memberships_description'];
            $price = $membership['memberships_price'];

            $updateQuery = "UPDATE users SET membership_name = '$name', membership_description = '$description', membership_price = '$price' WHERE user_EmailAddress = '$userEmail'";

            mysqli_query($connection, $updateQuery);

            $_SESSION['alert'] = "Membership subscribed successfully!";
            header("Location: profile.php");
        }   
    }
    header("Location: pricing.php");