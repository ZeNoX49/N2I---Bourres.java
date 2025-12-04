<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style-lasergame.css">
    <title>Lasergame</title>
</head>
<body>
<h1 style="color:black; z-index:1; position:relative;">DEBUG TEXTE</h1>

<?php include 'assets/html/header.html'; ?>

<div class="main">
    <div id="game-ui" style="dispal:none; position:fixed; top:10px; right:10px; z-index:9999; background:rgba(0,0,0,0.8); color:white; padding:15px; border-radius:8px;">
        <button id="start-game" style="background:#4CAF50; color:white; border:none; padding:10px; cursor:pointer;">
            Activer Lasergame (Arc)
        </button>
        <div id="game-info" style="margin-top:10px; display:none;">
            <div>Score: <span id="score">0</span> | Vie: <span id="hp">100</span> | Temps: <span id="timer">120</span>s</div>
            <div id="leaderboard"></div>
        </div>
    </div>

    <!-- Curseur Arc -->
    <div id="weapon-cursor" style="display:none; position:fixed; width:40px; height:40px; z-index:9998; pointer-events:none; background:url('assets/image/Arc.png') center/contain no-repeat; transform:translate(-50%,-50%); transition:transform 0.1s ease;"></div>

    <div id="game-over" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.9); color:white; text-align:center; z-index:10000;">   <h2>Fin de partie ! Score: <span id="final-score">0</span></h2>
        <input id="player-name" placeholder="Ton pseudo" maxlength="10" style="margin:10px; padding:10px;">
        <button id="save-score" style="margin:5px; padding:10px;">Sauvegarder</button>
        <button id="restart-game" style="margin:5px; padding:10px;">Rejouer</button>
    </div>

    <!-- (ajout class=enemy ici) -->
    <img class="enemy" data-enemy="100" src="assets/image/cible.png" style="width:200px;">
    <img class="enemy" data-enemy="50" src="assets/image/cible.png" style="width:150px;">

</div>

<?php include   'assets/html/footer.html'; ?>

<script src="assets/js/script.js"></script>
</body>
</html>
