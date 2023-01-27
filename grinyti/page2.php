<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="refresh" content="3; url=page3.php" />
    <style>
        /* pour centrer le titre horizontalement et verticalement */
        h1 {
            text-align: center;
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        /* pour styliser la barre de chargement */
        .loading {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .loading::before {
            content: "";
            display: block;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 6px solid #f3f3f3;
            border-top-color: #3498db;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="loading">
        <h1>Votre Publicité est en cour de vérification</h1>
    </div>
</body>
</html>
