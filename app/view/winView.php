<?php
// Démarrer la session si nécessaire
if(session_status() === PHP_SESSION_NONE){
    session_start();
}

// Récupérer le message
$txt = $_SESSION["txt"] ?? "";
$gif = $_SESSION["gif"] ?? "";
$img = $_SESSION["img"] ?? "";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Victoire !</title>
    <link rel="stylesheet" href="assets/css/formulaire.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        #message {
            font-size: 1.5em;
            margin-bottom: 20px;
            color: #333;
        }
        #media img {
            max-width: 300px;
            margin: 10px;
            border-radius: 10px;
        }
        #bouton {
            margin-top: 30px;
        }
        button {
            padding: 10px 20px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div id="message"><?= htmlspecialchars($txt) ?></div>

<?php if($gif || $img): ?>
    <div id="media">
        <?php if($gif): ?>
            <img src="<?= $gif ?>" alt="GIF victoire">
        <?php endif; ?>
        <?php if($img): ?>
            <img src="<?= $img ?>" alt="Image victoire">
        <?php endif; ?>
    </div>
<?php endif; ?>

<div id="bouton">
    <form method="GET" action="index.php">
        <button type="submit">Revenir au formulaire</button>
    </form>
</div>

</body>
</html>
