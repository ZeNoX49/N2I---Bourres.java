<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/snake.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Snake 8-Bit</title>
</head>

<body>
    <?php include 'app/view/header.php'; ?>
    <?php if (!isset($title) || $title !== "Accueil"): ?>
        <button onclick="window.location.href='?action=home'" class="btn-retour">Retour</button>
    <?php endif; ?>

    <div class="main-container">
        <div class="game-wrapper">
            <div class="score-board">SCORE: <span id="score">0</span></div>
            <canvas id="snakeCanvas" width="400" height="400"></canvas>
            <div class="controls-hint">USE ARROW KEYS</div>
        </div>
    </div>

    <?php include 'app/view/footer.php'; ?>
    <script src="assets/js/snake.js"></script>
</body>

</html>