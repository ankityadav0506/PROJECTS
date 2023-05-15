<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>

    <style>
        .container-main{
            background-color: grey;
            margin: 0 auto;
            width: 100%;
            height: 100%;
        }
        .container{
            margin:10px auto;
            background-color: green;
            height: 400px;
            width: 600px;
            border-radius: 25px;
        }
        .element{
            display: flex;
            height: 300px;
            width: 300px;
            color: bisque;
            margin: 50px;
            align-items: center;
        }
        .input-ctr{
            margin: 50px 50px;
        }
        input{
            margin-top: 25px;
        }
        .submit{
            padding: .5em;
            font-size: large;
            cursor: pointer;
            color: cadetblue;
            font-weight: bolder;
        }
        select{
            width: 170px;
            margin-top: 25px;
            font-size: large;
        }
        p{
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            color: aqua;
        }
    </style>
</head>
<body>
    <div class="container-main">
        <div class="container">
            <form action="" method="post">
                <div class="element">
                    <h1>PHP CALCULATOR</h1>
                    <div class="input-ctr">
                        <input type="text" name="num1" placeholder="Enter number">
                        <input type="text" name="num2" placeholder="Enter number">
                        <select name="operation">
                            <option value="add">ADD</option>
                            <option value="sub">SUB</option>
                            <option value="mult">MULT</option>
                            <option value="div">DIV</option>
                        </select>
                        <input type="submit" value="submit"  name="submit" class="submit">
                    </div>
                </div>
            </form>

            <div class="show_data">
                <p>
                    <?php
                        if(isset($_POST['submit'])){
                            $num1 = $_POST['num1'];
                            $num2 = $_POST['num2'];
                            

                            $operation = $_POST['operation'];

                            switch($operation){
                                case "add": $sum = $num1 + $num2;
                                            echo "The addition of the given numbers is {$sum}";
                                            break;
                                case "sub": $sum = $num1 - $num2;
                                            echo "The subtraction of the given numbers is {$sum}";
                                            break;
                                case "mult": $sum = $num1 * $num2;
                                            echo "The multiplication of the given numbers is {$sum}";
                                            break;
                                case "div": $sum = $num1 / $num2;
                                            echo "The division of the given numbers is {$sum}";
                                            break;
                                default: echo "Error!";
                            }
                        } 
                    ?>
                </p>
            </div>
        </div>
    </div>
</body>
</html>