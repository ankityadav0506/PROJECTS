<html>
    <head>
        <title></title>
        <style>
            *{
                margin: 0; 
                padding: 0;
                box-sizing: border-box;
            }
            h1{ 
                text-align: center;
                line-height: 20vh;
                color: #6c63ff;
            }
            .main-div{
                width: 100%;
                height: 80vh;
                display: flex;
                justify-content: space-around;
                align-items: center;
            }
            .left-side{
                background-color: #dfe6e9;
                border-radius: 50px;
            }
            .left-side img{
                width: 200px;
                height: auto;
            }
            .right-side{
                width: 400px;
                height: 300px;
                background-color: #dfe6e9;
                border-radius: 15px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .input1{
                width: 250px;
                height: 40px;
                padding: 5px;
                outline: none;
                border: 1px solid grey;
                border-radius: 5px; 
            }
            .selection{
                width: 100%;
                margin: 20px 60px;
            }
            .btn{
                padding: 10px 16px;
                margin: 0px 60px;
                border-radius: 5px;
                outline: none;
                border: none;
                background-color: #6c63ff;
                color: white;
                font-size: 0.9rem;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Temperature Conversion</h1>
            <div class="main-div">
                <div class="left-side">
                    <img src="temp.png">
                </div>
                <div class="right-side">
                    <form method="post">
                        <input type="text" name="num" placeholder="Enter the tempearature" class="input1">
                        <div class="selection">
                            <label>Celc</label>
                            <input type="radio" name="units" value="cel">
                            <label>Faren</label>
                            <input type="radio" name="units" value="feh">
                        </div>
                        <input type="submit" name="submit" value="Convert Now" class="btn">
                    </form>
                    
                    <div>
                        <br>
                        <p>
                            <?php 
                                if(isset($_POST['submit'])){
                                    $num = $_POST['num'];
                                    $temp = $_POST['units'];
                                    
                                    if($temp == "cel"){
                                        $result = $num * 9/5 + 32;
                                        echo "The value of given temperature is " .$result ." Celcius";
                                    }
                                    else{
                                        $result = ($num - 32) * 5/9;
                                        echo "The value of given temperature issss " .$result ." Farenhit";

                                    }
                                }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>