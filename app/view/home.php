<link rel="stylesheet" href="assets/css/music.css"> 
<div class="village">
    <a class="hsnake" href="?action=snake"></a>
    <a class="hlasergame" href="?action=lasergame"></a>
    <a class="hformulair" href="?action=formulaire"></a>
    <a class="hmusic" href="?action=music"></a>
    <button id="musicBtn">🔊</button>
    <script src="assets/js/music.js"></script>
    <div class="container">
        <button class="btn-dialog mbureautique" data-perso="mbureautique">
            <img src="assets/image/maison-orange.png"
                alt="Ouvrir le dialogue sur les logiciels de Bureautique"
                width="80" height="96">
        </button>
        <button class="btn-dialog mide" data-perso="mide">
            <img src="assets/image/maison-violette.png"
                alt="Ouvrir le dialogue sur les logiciels de Bureautique"
                width="88" height="136">
        </button>
        <button class="btn-dialog mos" data-perso="mos">
            <img src="assets/image/maison-bleue.png"
                alt="Ouvrir le dialogue sur les logiciels d'audio"
                width="90" height="120">
        </button>
        <button class="btn-dialog mdessin" data-perso="mdessin">
            <img src="assets/image/maison-jaune.png"
                alt="Ouvrir le dialogue sur les logiciels de dessins"
                width="92" height="100">
        </button>
        <button class="btn-dialog mmedia" data-perso="mmedia">
            <img src="assets/image/maison-verte.png"
                alt="Ouvrir le dialogue sur les logiciels de Bureautique"
                width="100" height="100">
        </button>
        <button class="btn-dialog mrgpd" data-perso="mrgpd">
            <img src="assets/image/maison-rouge.png"
                alt="Ouvrir le dialogue de Assurancetourix"
                width="100" height="100">
        </button>
        <button class="btn-dialog mnird" data-perso="mnird">
            <img src="assets/image/fontaine.png"
                alt="Ouvrir le dialogue de Assurancetourix"
                width="60" height="95">
        </button>
    </div>
    <dialog id="monPopup" class="dialog-bottom">
        <div class="contenu-dialog">
            <h2 id="popupTitre"></h2>
            <div id="popupTexte"></div>
        </div>

    </dialog>

</div>
<script src="assets/js/dialogue.js"></script>