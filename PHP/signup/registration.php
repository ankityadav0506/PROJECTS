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
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center">Get started with your free account</p>
            <p>
                <a href="" class="btn btn-block btn-gmail"> <i class="fa fa-google"></i>
                Login via Gmail </a>
                <a href="" class="btn btn-block btn-facebook"> <i class="fa fa-facebook"></i>
                Login via Facebook </a>
            </p>
            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="username" class="form-control" placeholder="Full Name" type="text" required>
                </div>

                <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" class="form-control" placeholder="Email Address" type="email" required>
                </div>  

                <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <input name="mobile" class="form-control" placeholder="Phone Number" type="number" required>
                </div>

                <div class="form-group input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="password" class="form-control" placeholder="Create Password" type="password" value="" required>
                </div>

                <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                </div>
                                <input name="cpassword" class="form-control" placeholder="Repeat password" type="password" required>
                </div>

                <div class="form-group">
                                    <button type="submit" name="submit" class="btn
                                    btn-primary btn-block"> Create Account </button>
                                    <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>
                </div>
            </form>
        </article>
    </div>
</body>
</html>