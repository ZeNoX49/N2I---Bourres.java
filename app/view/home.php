<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<div class="village">
    <a href="?action=dialogue/show&type=bureautique">MAISON bureautique</a>
    <a href="?action=dialogue/show&type=os">MAISON OS</a>
    <a href="?action=dialogue/show&type=dessin">MAISON Dessin</a>
    <a href="?action=dialogue/show&type=ide">MAISON IDE</a>
    <a href="?action=dialogue/show&type=audio">MAISON Audio</a>
    <a href="?action=dialogue/show&type=video">MAISON Video</a>
    <a href="?action=snake/show">Arbre</a>
    <a href="?action=lasergame/show">Cible</a>
</div>


<!-- Exemple de Yanis pour Théo -->
<div class="container">
    <button class="btn-dialog" data-perso="Panoramix">
        <img src="assets/img/monTheoAMOA.jpg"
             alt="Ouvrir le dialogue de Panoramix"
             width="100" height="100">
    </button>
    <button class="btn-dialog" data-perso="Assurancetourix">
        <img src="assets/img/monTheoAMOA.jpg"
             alt="Ouvrir le dialogue de Panoramix"
             width="100" height="100">
    </button>
</div>

<dialog id="monPopup">
    <h2 id="popupTitre"></h2>
    <div id="popupTexte"></div>
    <form method="dialog"><button>Fermer</button></form>
</dialog>


<script src="assets/js/dialogue.js"></script>