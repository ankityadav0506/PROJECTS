<?php 
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <?php 
        include 'links/link.php';
        include 'css/style.php';
    ?>
</head>
<body>
    
    <?php 

        include 'dbconn.php';
        if(isset($_POST['submit'])){
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

            $pass = password_hash($password, PASSWORD_BCRYPT);
            $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

            $emailquery = "select * from registration where email='$email'";
            $query = mysqli_query($conn, $emailquery);

            $emailcount = mysqli_num_rows($query);
            
            if($emailcount>0){
                echo "Email already exists";
            }
            else{
                if($password === $cpassword){
                    $insertquery = "INSERT INTO registration (username, email, mobile, password, cpassword) 
                                    VALUES ('$username','$email','$mobile','$pass','$cpass')";
                    
                    $iquery = mysqli_query($conn,$insertquery);

                    if($iquery){
                        ?>
                        <script>
                            alert("Form filled sucessfully");
                        </script>
                        <?php
                    }
                }
                else{
                    echo "Passwords donot match!";
                }
            }
        }
    ?>


    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 800px;">
            <div style="margin-top: 10em;"></div>
            <h4 class="card-title mt-3" style="color: darkblue; font-weight: bolder;">Find out your current English level!</h4>
            <br>
            <p class="" style="color: darkblue; font-weight: light; font-size: 1.5rem;">
                This online level test will give you an <span style="font-weight: bolder"> approximate </span>indication of your English language level.
            </p>
            <p class="divider-text">
                <span class="bg-light"></span>
            </p>
            <p class="" style="color: darkblue; font-weight: light; font-size: 1.5rem;">
                There are 12 questions and the test takes less than 5 minutes.<br> 
                Upon completion, we'll email your results.
            </p>

            <br>
            <button type="submit" name="submit" class="btn" > 
                    <span style="font-weight: bolder"> 
                        <a href="test.php"
                        style="color: white; font-weight: light; font-size: 1.2rem;
                    padding: 1em; background-color:blue; text-decoration: none;">
                    Start test now</a>
                    </span> 
            </button>
            <div style="margin-top: 10em;"></div>
            
        </article>
    </div>
</body>
</html>