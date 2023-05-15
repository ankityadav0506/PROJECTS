<?php include "db_conn.php" ?>
<html>
    <head>
        <title>View</title>
        <style>
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                min-height: 100vh;
            } 
            .alb{
                width: 200px;
                height: 200px;
                padding: 5px;
            }
            .alb img{
                width: 100%;
                height: 100%;
            }
            a{
                text-decoration: none;
                color: black;
                padding: 2rem;
            }
        </style>
    </head>

    <body>
        <a href="index.php">&#8592; Go Back</a>
        
        <form action="img_retrieval.php" method="post" enctype="multipart/form-data">
            <input type="text" name="search">
            <input type="submit" name="submit">
        </form>
    </body>
</html>