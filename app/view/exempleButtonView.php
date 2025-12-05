<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Exemple</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>

<body>
    <button onclick="window.location.href='?action=home'" class="btn-retour">Retour</button>

    <div class="container">
        <button class="btn-dialog" data-perso="Panoramix">
            coucou panoramix
        </button>
    </div>

    <dialog id="monPopup">
        <h2 id="popupTitre"></h2>
        <div id="popupTexte"></div>
        <form method="dialog"><button>Fermer</button></form>
    </dialog>


    <script src="assets/js/dialogue.js"></script>

</body>

</html>