let dialoguesData = null;


fetch('assets/json/dialogues.json')
    .then(response => response.json())
    .then(data => {
      dialoguesData = data; // On stocke les données reçues
      console.log("Données chargées !", data);
    })
    .catch(error => console.error('Erreur de chargement JSON:', error));

// 2. Gestion des clics
document.addEventListener('DOMContentLoaded', () => {
  const dialog = document.getElementById('monPopup');
  const titreEl = document.getElementById('popupTitre');
  const texteEl = document.getElementById('popupTexte');
  const avatarEl = document.getElementById('popupAvatar');
  document.querySelectorAll('.btn-dialog').forEach(btn => {
    console.log("coucou");
    btn.addEventListener('click', () => {

      // Sécurité : on vérifie que les données sont bien arrivées
      if (!dialoguesData) {
        alert("Les dialogues chargent encore, réessayez dans une seconde !");
        return;
      }

      const clePerso = btn.getAttribute('data-perso');
      const infos = dialoguesData[clePerso];

      if (infos) {
        titreEl.textContent = infos.titre;
        texteEl.innerText = infos.text;
        avatarEl.src = 'assets/img/persos/' + clePerso + '.jpg';
        dialog.showModal();
      }
    });
  });
  dialog.addEventListener('click', (event) => {
    const rect = dialog.getBoundingClientRect();
    if (event.clientY < rect.top || event.clientY > rect.bottom ||
        event.clientX < rect.left || event.clientX > rect.right) {
      dialog.close();
    }
  });
});