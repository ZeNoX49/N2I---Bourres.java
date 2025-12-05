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
  let etapeActuelle = 0;
  document.querySelectorAll('.btn-dialog').forEach(btn => {
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
        texteEl.innerText = infos.conv[etapeActuelle].text;
        avatarEl.src = 'assets/img/persos/' + infos.conv[etapeActuelle].image + '.jpg';
        dialog.id = clePerso;
        dialog.showModal();
      }
    });
  });
  dialog.addEventListener('click', (event) => {
    const rect = dialog.getBoundingClientRect();
      const clePerso = dialog.id;
      const infos = dialoguesData[clePerso];
      if (infos.conv.length-1 > etapeActuelle){
        etapeActuelle++;
        console.log(infos.conv[etapeActuelle]);
        texteEl.innerText = infos.conv[etapeActuelle].text;
        avatarEl.src = 'assets/img/persos/' + infos.conv[etapeActuelle].image + '.jpg';
        dialog.showModal();
      }
      else {
        etapeActuelle = 0;
        dialog.close();
      }

  });
});