<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style-lasergame.css">
    <title>Lasergame</title>
</head>
<body>

<div id="game-ui"
     style="position:fixed; top:10px; right:10px; z-index:9999;
            background:rgba(0,0,0,0.8); color:white;
            padding:15px; border-radius:8px;">
    <button id="start-game"
            style="background:#4CAF50; color:white; border:none;
                   padding:10px 15px; cursor:pointer;">
        Activer Laser Game
    </button>
    <div id="game-info" style="margin-top:10px; display:none;">
        <div>Score: <span id="score">0</span> |
            Vie: <span id="hp">100</span> |
            Temps: <span id="timer">60</span>s</div>
        <div id="leaderboard"></div>
    </div>
</div>

<div id="weapon-cursor"
     style="display:none; position:fixed; width:40px; height:40px;
            z-index:9998; pointer-events:none;
            background:url('assets/image/Arc.png') center/contain no-repeat;
            transform:translate(-50%,-50%);
            transition:transform 0.1s ease;"></div>

<div id="game-over"
     style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
            background:rgba(0,0,0,0.9); color:white; text-align:center;
            z-index:10000;">
    <div style="position:absolute; top:50%; left:50%;
                transform:translate(-50%,-50%);">
        <h2>Fin de partie ! Score : <span id="final-score">0</span></h2>

        <input id="player-name"
               placeholder="Ton pseudo" maxlength="10"
               style="margin:10px; padding:10px;">

        <button id="save-score"
                style="margin:5px; padding:10px 20px;">Sauvegarder le score</button>

        <div id="end-buttons" style="display:none; margin-top:10px;">
            <button id="restart-game"
                    style="margin:5px; padding:10px 20px;">Rejouer</button>
            <button id="quit-game"
                    style="margin:5px; padding:10px 20px;">Quitter</button>
        </div>
    </div>
</div>


<?php include   'assets/html/footer.html'; ?>

<script src="assets/js/script.js"></script>
</body>
</html>
