<html>
    <head>
        <?php include 'css/style.css' ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="main-div">
            <h1>List of candidates for Web Developer Job</h1>
            <div class="center-div">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Degree</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Refer</th>
                                <th>Post</th>
                                <th colspan="2">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 

                                include 'connection.php';

                                $sql = "select * from jobregistration";

                                $query = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($query);

                                while($res = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $res['id'];?></td>
                                    <td><?php echo $res['name'];?></td>
                                    <td><?php echo $res['degree'];?></td>
                                    <td><?php echo $res['mobile'];?></td>
                                    <td><span class="email-style"><?php echo $res['email'];?></span></td>
                                    <td><?php echo $res['refer'];?></td>
                                    <td><?php echo $res['jobpost'];?></td>
                                    <td><a href="updates.php?id=<?php echo $res['id'] ?>" data-toggle="tooltip" data-placement="bottom"
                                        title="UPDATE"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    </td>
                                    <td><a href="delete.php?id=<?php echo $res['id'] ?>" data-toggle="tooltip" data-placement="bottom"
                                        title="DELETE"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php
                                }
                            ?>
                                
                        </tbody>
                    </table>
                </div>
                <a href="index.php" 
                   style="background: lightgreen; padding: 1em; margin-top: 3em;">HOME PAGE</a>
            </div>
        </div>

        <script>
            $(document).ready(function(){
                $('[data-toogle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>