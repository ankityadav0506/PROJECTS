<?php 
    include 'connection.php';

    $id = $_GET['id'];

    $deletequery = "delete from jobregistration where id=$id";

    $query = mysqli_query($conn, $deletequery);

    if($query){
        ?>
        <script>
            alert("DELETED SUCCESFULLY!");
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert("!NOT DELETED");
        </script>
        <?php
    }

    header('location:display.php');
?>