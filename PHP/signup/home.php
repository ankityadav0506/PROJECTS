<?php 
    session_start();

    if(!isset($_SESSION['username'])){
        echo "You are logged out";
        header('location: login.php');
    }
?>

<html>
    <head></head>
    <body>
        <h1>Hello,<?php echo  $_SESSION['username']; ?></h1>

        <div>
            <button type="button"><a href="logout.php">Log Out</a></button>
        </div>
    </body>
</html>