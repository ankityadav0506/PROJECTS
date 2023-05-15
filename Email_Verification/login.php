<?php 
    session_start();
?>


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
            $email = $_POST['email'];
            $password = $_POST['password'];

            $email_search = "select * from registration where email='$email' and status='active'";
            $query = mysqli_query($conn, $email_search);

            $email_count = mysqli_num_rows($query);

            if($email_count){
                $email_pass = mysqli_fetch_assoc($query);
                $db_pass = $email_pass['password'];
                $_SESSION['username'] = $email_pass['username'];
                $pass_decode = password_verify($password, $db_pass);

                if($pass_decode){
                    if(isset($_POST['rememberme'])){
                        setcookie('emailcookie',$email,time()+86400);
                        setcookie('passwordcookie',$password,time()+86400);
                        header("location: home.php");
                    }
                    else{
                        header("location: home.php");
                    }
                }
                else{
                    echo "Incorrect password";
                }
            }
            else{
                echo "Invalid Email";
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

            <div>
                <p><?php 
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                    }
                    else{
                        echo $_SESSION['msg'] = "You are logged out";
                    } ?></p>
            </div>

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="Enter Email" type="text" 
                           value="<?php if(isset($_COOKIE['emailcookie'])) {echo $_COOKIE['emailcookie'];} ?>" required>
                </div>

                <div class="form-group input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="password" class="form-control" placeholder="Enter Password" type="password" 
                                   value="<?php if(isset($_COOKIE['passwordcookie'])) {echo $_COOKIE['passwordcookie'];} ?>" required>
                </div>

                <div class="form-group input-group">
                            <input name="rememberme" type="checkbox"> Remember Me
                </div>

                <div class="form-group">
                                    <button type="submit" name="submit" class="btn
                                    btn-primary btn-block"> Login </button>
                                    <p class="text-center">Forgot your password? <a href="recover_email.php">Click here</a> </p>
                                    <p class="text-center">Don't have an account? <a href="registration.php">Sign Up here</a> </p>
                </div>
            </form>
        </article>
    </div>
</body>
</html>