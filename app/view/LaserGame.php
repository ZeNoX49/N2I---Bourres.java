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
     style="position:fixed; top:50%; left:50%; transform:translate(-50%,-50%);
            background: linear-gradient(145deg, #3d2424, #1f1111);
            border: 4px solid #5e2c2c; box-shadow:
                0 0 0 2px #522828, inset 0 0 20px rgba(0,0,0,0.7), 12px 12px 0 #261010;
            padding:30px; border-radius:12px; min-width:250px; text-align:center;
            font-family:'Press Start 2P', monospace; image-rendering: pixelated;">

    <button id="back-btn"
            style="background: linear-gradient(145deg, #6b4a4a, #8e5e5e);
                   border: 3px solid #4a2e2e; color:#311515; font-weight:bold;
                   padding:12px 20px; cursor:pointer; font-size:0.75rem;
                   text-transform:uppercase; letter-spacing:1px; font-family:'Press Start 2P';
                   box-shadow:4px 4px 0 #1a1a1a, inset 0 1px 2px rgba(255,255,255,0.2);
                   border-radius:6px; image-rendering:pixelated; width:100%; margin-bottom:10px;"
            onclick="window.history.back()">
        ← RETOUR
    </button>

    <button id="start-game"
            style="background: linear-gradient(145deg, #5e2d2d, #8f5454);
                   border: 3px solid #5a2e2e; color:#230f0f; font-weight:bold;
                   padding:18px 30px; cursor:pointer; font-size:0.9rem;
                   text-transform:uppercase; letter-spacing:2px; font-family:'Press Start 2P';
                   box-shadow:6px 6px 0 #311515, inset 0 2px 4px rgba(255,255,255,0.3);
                   border-radius:8px; image-rendering:pixelated; width:100%;">
         START GAME
    </button>

    <div id="game-info" style="margin-top:20px; display:none; font-size:0.7rem; color: white">
        <div>Score: <span id="score">0</span> | Vie: <span id="hp">100</span> | Temps: <span id="timer">60</span>s</div>
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

<script src="assets/js/script.js"></script>
</body>
</html>
