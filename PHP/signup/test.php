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


        $server = "localhost";
        $user = "root";
        $password = "";
        $db = "esol";

        $conn = mysqli_connect($server,$user,$password,$db);

        if(isset($_POST['submit'])){
            
            $ans = $_POST['ans'];
            
            $query = "insert into answers (`answer`) VALUES ('$ans')";
            $res = mysqli_query($conn, $query);

        }
    ?>


    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 800px;">
            
            <form action="" method="POST">
                <br>
                <div class="form-group">
                    
                    <div>        
                        <p class="divider-text"></p>
                                <br>
                                <br>
                                <h4 class="card-title mt-3" style="color: darkblue; font-weight: light; font-size: 1.5rem;">Q->1/5</h4>
                                <br>
                                <p class="" style="color: darkblue; font-weight: light; font-size: 1.5rem;">
                                We are __________ a party at my apartment. Would you like to come? *
                                </p>

                                <div class="" style="color: darkblue; font-weight: light; font-size: 1.5rem;">
                                    <input type="radio" value="q1" name="ans1" required> having </input>
                                    <input type="radio" value="q2" name="ans2" style="margin-left: 1em;" required> have </input>
                                    <input type="radio" value="q3" name="ans3" style="margin-left: 1em;" required> to have </input>
                                </div>
                                <br>

                            <br>
                            <br>
                    </div>        
                
                    <div>        
                        <p class="divider-text"></p>
                                <br>
                                <br>
                                <h4 class="card-title mt-3" style="color: darkblue; font-weight: light; font-size: 1.5rem;">Q->2/5</h4>
                                <br>
                                <p class="" style="color: darkblue; font-weight: light; font-size: 1.5rem;">
                                We are __________ a party at my apartment. Would you like to come? *
                                </p>

                                <div class="" style="color: darkblue; font-weight: light; font-size: 1.5rem;">
                                    <input type="radio" value="q2" name="ans2" required> having </input>
                                    <input type="radio" value="q2" name="ans2" style="margin-left: 1em;" required> have </input>
                                    <input type="radio" value="q3" name="ans2" style="margin-left: 1em;" required> to have </input>
                                </div>
                                <br>

                            <br>
                            <br>
                    </div>        
                
                    <div>        
                        <p class="divider-text"></p>
                                <br>
                                <br>
                                <h4 class="card-title mt-3" style="color: darkblue; font-weight: light; font-size: 1.5rem;">Q->1/5</h4>
                                <br>
                                <p class="" style="color: darkblue; font-weight: light; font-size: 1.5rem;">
                                We are __________ a party at my apartment. Would you like to come? *
                                </p>

                                <div class="" style="color: darkblue; font-weight: light; font-size: 1.5rem;">
                                    <input type="radio" value="one" name="ans" required> having </input>
                                    <input type="radio" value="two" name="ans" style="margin-left: 1em;" required> have </input>
                                    <input type="radio" value="three" name="ans" style="margin-left: 1em;" required> to have </input>
                                </div>
                                <br>

                            <br>
                            <br>
                    </div>        
                
                    <div>        
                        <p class="divider-text"></p>
                                <br>
                                <br>
                                <h4 class="card-title mt-3" style="color: darkblue; font-weight: light; font-size: 1.5rem;">Q->1/5</h4>
                                <br>
                                <p class="" style="color: darkblue; font-weight: light; font-size: 1.5rem;">
                                We are __________ a party at my apartment. Would you like to come? *
                                </p>

                                <div class="" style="color: darkblue; font-weight: light; font-size: 1.5rem;">
                                    <input type="radio" value="one" name="ans" required> having </input>
                                    <input type="radio" value="two" name="ans" style="margin-left: 1em;" required> have </input>
                                    <input type="radio" value="three" name="ans" style="margin-left: 1em;" required> to have </input>
                                </div>
                                <br>

                            <br>
                            <br>
                    </div>        
                
                    <div>        
                        <p class="divider-text"></p>
                                <br>
                                <br>
                                <h4 class="card-title mt-3" style="color: darkblue; font-weight: light; font-size: 1.5rem;">Q->1/5</h4>
                                <br>
                                <p class="" style="color: darkblue; font-weight: light; font-size: 1.5rem;">
                                We are __________ a party at my apartment. Would you like to come? *
                                </p>

                                <div class="" style="color: darkblue; font-weight: light; font-size: 1.5rem;">
                                    <input type="radio" value="one" name="ans" required> having </input>
                                    <input type="radio" value="two" name="ans" style="margin-left: 1em;" required> have </input>
                                    <input type="radio" value="three" name="ans" style="margin-left: 1em;" required> to have </input>
                                </div>
                                <br>

                                <button type="submit" name="submit" class="btn" 
                                style="color: white; font-weight: light; font-size: 1.2rem;
                                padding: .5em; background-color:blue;"> <span style="font-weight: bolder"> Submit </span> </button>
                            <br>
                            <br>
                    </div>        
                
                </div>
                <div style="margin-top: 10em;"></div>
            </form>
        </article>
    </div>
</body>
</html>