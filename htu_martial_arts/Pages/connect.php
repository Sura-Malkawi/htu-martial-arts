<?php
    $connection = mysqli_connect('localhost', 'root', '', 'htu_martial_arts');

    if ($connection) 
    {
        echo "success connection";
    } 
    else 
    {
        mysqli_error($connection);
    }
?>