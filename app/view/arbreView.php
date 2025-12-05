<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/arbre.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>L'Arbre</title>
</head>

<body>
    <?php include 'app/view/header.php'; ?>

    <div class="main-container">
        <h1>Clique sur l'arbre...</h1>
        <a href="index.php?action=snake" class="tree-link" title="Jouer au Snake">
            <div class="pixel-tree"></div>
        </a>
    </div>

    <?php include 'app/view/footer.php'; ?>
</body>

</html>