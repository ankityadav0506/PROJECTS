<?php 
    $username = "root";
    $password = "";
    $server = '';
    $db = 'jobportal';

    $conn = mysqli_connect($server,$username,$password,$db);

    if($conn){
        // echo "Connection Sucessfull";
        ?>
        <!-- <script>
            alert('Connection Sucessfull');
        </script> -->
        <?php 
    }
?>
