<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload & Retrieval</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <?php if (isset($_GET['error'])): ?>    
        <p><?php echo $_GET['error']; ?></p>
    <?php endif ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        
        <p>Enter Your Name</p>
        <input type="text" name="name">
        <p>Upload Image</p>
        <input type="file" name="my_image">
        <br>
        <br>
        <input type="submit" name="submit" value="Upload">

    </form>
    <br>
    <div><a href="view.php">View Images</a></div>
</body>
</html>