<?php 

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Job Portal</title>
    <?php include 'css/style.css' ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="icon.jpg">
                <h3>Welcome</h3>
                <p>Please fill all the details carefully. This form can
                    change your life.
                </p>
                <a href="display.php">Check Form</a>
            </div>
            <div class="col-md-8 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Apply for Web Developer Post</h3>

                            <form action="" method="POST">
                                <div class="row register-form">
                                <?php 
                                    include 'connection.php';

                                    $ids = $_GET['id'];

                                    $showquery = "select * from jobregistration where id={$ids}";
                                    $showdata = mysqli_query($conn, $showquery);

                                    $arrdata = mysqli_fetch_array($showdata);

                                    if(isset($_POST['submit'])){
                                        $idupdate = $_GET['id'];

                                        $name = $_POST['user'];
                                        $degree = $_POST['degree'];
                                        $mobile = $_POST['mobile'];
                                        $email = $_POST['email'];
                                        $refer = $_POST['refer'];
                                        $jobprofile = $_POST['jobprofile'];

                                        // $insertquery = " insert into jobregistration
                                        //                 (name, degree, mobile, email, refer, jobpost) values 
                                        //                 ('$name', '$degree', '$mobile', '$email', '$refer', '$jobprofile')";

                                        $query = "update jobregistration set id=$idupdate, name='$name', degree='$degree',
                                                  mobile='$mobile', email='$email', refer='$refer', jobpost='$jobprofile'
                                                  where id=$idupdate";

                                        $res = mysqli_query($conn, $query);

                                        if($res){
                                            ?>
                                            <script>
                                                alert('Form Updated Sucessfully');
                                            </script>
                                            <?php
                                        }
                                    }
                                ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                            placeholder="enter your name" name="user"
                                            value="<?php echo $arrdata['name'];?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control"
                                            placeholder="mobile number" name="mobile"
                                            value="<?php echo $arrdata['mobile'];?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                            placeholder="Any references" name="refer"
                                            value="<?php echo $arrdata['refer'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control"
                                            placeholder="email id" name="email"
                                            value="<?php echo $arrdata['email'];?>">
                                        </div>
                                            <div class="form-group">
                                            <input type="text" class="form-control"
                                            placeholder="enter your qualification" name="degree"
                                            value="<?php echo $arrdata['degree'];?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                            placeholder="Web Developer" name="jobprofile"
                                            value="<?php echo $arrdata['jobpost'];?>">
                                        </div>
                                        <input type="submit" name="submit" value="Update" class="btnRegister">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html> 


