<?php

if (isset($_POST['submit']) && isset($_FILES['my_image'])){
    include "db_conn.php";

    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";

    $name = $_REQUEST['name'];
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];
    $imgContent = addslashes(file_get_contents($tmp_name)); 

    if($error === 0){
        if($img_size > 1048576){
            $em = "Sorry! Your File is to large (Max. 1Mb)";
            header("Location: index.php?error=$em");
        }
        else{
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");

            if(in_array($img_ex_lc, $allowed_exs)){

               // INSERT INTO DATABASE
                $sql1 = "INSERT INTO name (name) VALUES ('$name')";
                $sql2 = "INSERT INTO images (image_url) VALUES ('$imgContent')";
                mysqli_query($conn, $sql1);
                mysqli_query($conn, $sql2);
                header("Location: view.php");

                
            }

            else{
                $em = "This type of file format is NOT SUPPORTED!";
                header("Location: index.php?error=$em");
            }
        }
    }

    else{
        $em = "unknown error!";
        header("Location : index.php?error=$em");
    }
}

else{
    header("Location : index.php");
}

?>
