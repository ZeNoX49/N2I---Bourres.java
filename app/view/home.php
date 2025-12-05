
<div class="village">
    <a class="mdessin" href="?action=dialogue/show&type=dessin">MAISON Dessin</a>
    <a class="mide" href="?action=dialogue/show&type=ide">MAISON IDE</a>
    <a class="mmedia" href="?action=dialogue/show&type=media">MAISON Media</a>
    <a class="mrgpd" href="?action=dialogue/show&type=rgpd">MAISON Rgpd</a>
    <a class="hsnake" href="?action=snake/show">Arbre</a>
    <a class="hlasergame" href="?action=lasergame/show">Cible</a>
    <a class="hformulair" href="?action=formulaire/show">Formulaire</a>



<div class="container">
    <button class="btn-dialog mide" data-perso="mide">
        <img src="assets/image/maison-violette.png"
             alt="Ouvrir le dialogue sur les logiciels de Bureautique"
             width="88" height="136">
    </button>
    <button class="btn-dialog mos" data-perso="mos">
        <img src="assets/image/maison-bleue.png"
             alt="Ouvrir le dialogue sur les logiciels d'audio"
             width="100" height="100">
    </button>
    <button class="btn-dialog mdessin" data-perso="mdessin">
        <img src="assets/img/monTheoAMOA.jpg"
             alt="Ouvrir le dialogue sur les logiciels de dessins"
             width="100" height="100">
    </button>
    <button class="btn-dialog mmedia" data-perso="mmedia">
        <img src="assets/img/monTheoAMOA.jpg"
             alt="Ouvrir le dialogue sur les logiciels de Bureautique"
             width="100" height="100">
    </button>
    <button class="btn-dialog mrgpd" data-perso="mrgpd">
        <img src="assets/img/monTheoAMOA.jpg"
             alt="Ouvrir le dialogue de Assurancetourix"
             width="100" height="100">
    </button>
    <button class="btn-dialog mnird" data-perso="mnird">
        <img src="assets/img/monTheoAMOA.jpg"
             alt="Ouvrir le dialogue de Assurancetourix"
             width="92" height="130">
    </button>
</div>

<dialog id="monPopup" class="dialog-bottom">
    <img id="popupAvatar" class="avatar-flottant" src="" alt="Avatar">
    <div class="contenu-dialog">
        <h2 id="popupTitre"></h2>
        <div id="popupTexte"></div>
        <form method="dialog"><button>Fermer</button></form>
    </div>

</dialog>

</div>
<script src="assets/js/dialogue.js"></script>