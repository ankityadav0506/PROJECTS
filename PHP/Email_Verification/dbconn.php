<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "email_verification";

    $conn = mysqli_connect($server,$user,$password,$db);

    if($conn){
        echo "Connection Sucessfull"; 
    }
?>