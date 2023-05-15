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

            if(isset($_GET['token'])){

                $token = $_GET['token'];

                $newpassword = mysqli_real_escape_string($conn, $_POST['password']);
                $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

                $pass = password_hash($newpassword, PASSWORD_BCRYPT);
                $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

                if($newpassword === $cpassword){

                        $updatequery = "update registration set password='$pass'
                                        where token='$token'";
                
                        $iquery = mysqli_query($conn,$updatequery);

                        if($iquery){
                            $_SESSION['msg'] = "Your password has been changed.";
                            header("location: login.php");
                        }
                        else{
                            $_SESSION['passmsg'] = "Your password is not updated";
                            header("location: reset_password.php");
                        }
                }
                else{
                        $_SESSION['passmsg'] = "Password do not match";
                }
            }
        }
    ?>


    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Reset Your Password</h4>
            <p class="text-center">Enter your new password</p>
            <p><?php 
                if(isset($_SESSION['passmsg'])){
                echo $_SESSION['passmsg'];
                }
                else{
                    $_SESSION['passmsg']= "";
                } ?> </p>

            <form action="" method="post">

                <div class="form-group input-group">

                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="password" class="form-control" placeholder="Enter New Password" type="password"
                        value="" required>
                </div>

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="cpassword" class="form-control" placeholder="Confirm password" type="password"
                        required>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn
                                    btn-primary btn-block"> Create New Password </button>
                    <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>
                </div>
            </form>
        </article>
    </div>
</body>

</html>