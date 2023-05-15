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
            $email = mysqli_real_escape_string($conn, $_POST['email']);

            $emailquery = "select * from registration where email='$email'";
            $query = mysqli_query($conn, $emailquery);

            $emailcount = mysqli_num_rows($query);
            
                    if($emailcount){
                        $userdata = mysqli_fetch_array($query);
                        $username = $userdata['username'];
                        $token = $userdata['token'];

                        $subject = "Password Reset";
                        $body = "Hi, $username.
                        Click here to reset your password
                        http://localhost/PROJECTS%20(PHP)/Email_Verification/reset_password.php?token=$token";
                        $sender_email = "From: ankityadav2656@gmail.com";

                        mail($email, $subject, $body, $sender_email);

                        if(mail($email, $subject, $body, $sender_email)){
                            $_SESSION['msg'] = "Check $email to reset your password";
                            header("location: login.php");
                        }
                    }
                    else{
                        echo "No such Email found";
                    }
        }    
    ?>


    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Recover Your Account</h4>
            <p class="text-center">Enter your email address</p>

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email Address" type="email" required>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn
                                    btn-primary btn-block"> Send Mail </button>
                    <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>
                </div>
            </form>
        </article>
    </div>
</body>

</html>