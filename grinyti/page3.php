<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GRINYTI</title>
</head>
<body>

<img src="./img/LOGOGREEN.png" alt="" style="margin-left: 350px;">

<?php
    session_start();
    if(!isset($_SESSION['image'])){
        header("Location: page1.php");
        exit;
    }
?>

<div class="image-cont" style="text-align:center;">
    <img src="images/<?php echo $_SESSION['image']; ?>" alt="Uploaded Image">
</div>

</body>
</html>
