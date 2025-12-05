document.addEventListener('DOMContentLoaded', () => {
    // Les variables DIALOGUE_DATA et CHARACTER_IDS sont injectées globalement par PHP/dialogue_view.php

    // Déclaration des éléments du DOM
    const dialog = document.getElementById('dialogueModal');
    const dialogueTitleEl = document.getElementById('dialogueTitle');
    const dialogueLineEl = document.getElementById('dialogue-line');
    const nextButton = document.getElementById('next-button');
    const controlsBox = document.querySelector('.controls-box');
    
    // Variables de gestion du dialogue séquentiel
    let currentScenes = DIALOGUE_DATA; // Utilise les données injectées
    let currentSceneIndex = 0;
    
    // Initialisation dynamique des conteneurs de personnages
    const charContainers = {};
    CHARACTER_IDS.forEach(id => {
        charContainers[id] = document.getElementById(`character-${id}`);
    });


    // --------------------------------------------------------
    // --- MOTEUR DE DIALOGUE SÉQUENTIEL AVEC ACTEURS ---
    // --------------------------------------------------------

    /**
     * Met à jour l'affichage des personnages (actif / inactif).
     */
    function updateCharacterDisplay(speakerId) {
        CHARACTER_IDS.forEach(id => {
            const container = charContainers[id];
            if (id === speakerId) {
                container.classList.add('active');
                container.classList.remove('inactive');
            } else {
                container.classList.add('inactive');
                container.classList.remove('active');
            }
        });
    }

    /**
     * Affiche la scène de dialogue actuelle.
     */
    function showCurrentScene() {
        if (currentSceneIndex < currentScenes.length) {
            const scene = currentScenes[currentSceneIndex];
            
            // 1. Mise à jour du texte
            dialogueLineEl.textContent = scene.text;
            
            // 2. Mise à jour de l'affichage des personnages (filtre grisé)
            updateCharacterDisplay(scene.speaker);

            // 3. Afficher les contrôles
            nextButton.style.display = 'block';
            controlsBox.style.display = 'block';
            
            currentSceneIndex++;

        } else {
            // Fin du dialogue
            dialogueLineEl.textContent = 'Fin du dialogue. Merci d\'avoir écouté !';
            nextButton.style.display = 'none';
            controlsBox.style.display = 'none';
            
            // Griser tout le monde à la fin
            CHARACTER_IDS.forEach(id => {
                charContainers[id].classList.add('inactive');
                charContainers[id].classList.remove('active');
            });
        }
    }

    // --------------------------------------------------------
    // --- GESTION DU DÉMARRAGE ET DES ÉVÉNEMENTS ---
    // --------------------------------------------------------

    // Gestion du clic sur le bouton SUIVANT
    nextButton.addEventListener('click', showCurrentScene);

    // Initialisation : Afficher la première scène et ouvrir la modale
    if (currentScenes.length > 0) {
        dialog.showModal(); // Ouvrir la boîte de dialogue
        showCurrentScene(); // Afficher la première scène
    }

    // Fermeture de la modale au clic en dehors
    dialog.addEventListener('click', (event) => {
        const rect = dialog.getBoundingClientRect();
        if (event.clientY < rect.top || event.clientY > rect.bottom ||
            event.clientX < rect.left || event.clientX > rect.right) {
          dialog.close();
        }
    });
});