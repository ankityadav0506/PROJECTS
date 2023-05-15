<?php include "db_conn.php" ?>
<html>
    <head>
        <title>IMG_RETRIEVAL</title>
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

    <?php 

        if(isset($_POST['submit'])){

        $search = $_POST['search'];
        $sql = "SELECT image_url
        FROM images 
        WHERE ID IN (SELECT ID 
              FROM name 
              WHERE name='$search');";
    
        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0){
            while($images = mysqli_fetch_assoc($res)){  ?>

            <div class="alb">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($images['image_url']); ?>" />
            </div>
    <?php } }
    }?><a href="view.php">&#8592; Go Back</a> 
    </body>
</html>
