<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GRINYTI</title>
</head>
<?php
    session_start();
    $user = 'root';
    $pass = 'root';

    try {
        $db = new PDO ('mysql:host=localhost;dbname=grinyti;', $user, $pass);
        if(isset($_POST['ok']))
        {
            $nom = $_POST['nom'];
            $mail = $_POST['mail'];
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];

            move_uploaded_file($image_tmp, "images/$image");

            $sql = "INSERT INTO `formulaire`(`image`, `nom`, `mail`) VALUES (:image, :nom, :mail)";

            $stmt = $db->prepare($sql);

            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':image', $image);

            if ($stmt->execute()) {
                $_SESSION['image'] = $image;
                header("Location: page2.php");
                exit;
              } else {
                print_r($stmt->errorInfo());
              }
        }   
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
?>

<body>

    <img src="./img/LOGOGREEN.png" alt="" style="margin-left: 350px;">

    <a href="https://www.canva.com" target="_blank">
  <button>   
    <img src="https://static-cse.canva.com/_next/static/assets/logo_w2000xh641_3b021976d60d0277e95febf805ad9fe8c7d6d54f86969ec03b83299084b7cb93.png" alt="Canva logo" style="width:5%;">
  </button>
</a>

    <div class="btnpub" style="padding-top:50px;">
<form method="post" action="" enctype="multipart/form-data">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>
    <br>
    <label for="mail">Email :</label>
    <input type="email" id="mail" name="mail" required>
    <br>
    <label for="image">Image :</label>
    <input type="file" id="image" name="image" accept="image/*" required>
    <br>
    <input type="submit" name="ok" value="Envoyer">

</form>

<style>

form {
    width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
}

label {
    font-weight: bold;
    margin-bottom: 10px;
    display: block;
}

input[type="text"], input[type="email"], input[type="file"] {
    width: 100%;
    padding: 12px 20px;
    margin-bottom: 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    width: 100%;
    background-color: #36A793 ;
    color: white;
    padding: 14px 20px;
    margin-top: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #B5DCC9 ;
}

</style>

</div>
</body>
</html>
