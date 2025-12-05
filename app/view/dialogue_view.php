<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($dialogue_title); ?></title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Ajout de styles pour les images basées sur les noms des personnages, si besoin. */
        /* Par exemple, si l'image de Panoramix doit être plus petite que celle d'Obélix. */
    </style>
</head>
<body>

    <dialog id="dialogueModal" class="dialogue-container"> 
        
        <h3 id="dialogueTitle" class="main-title"><?php echo htmlspecialchars($dialogue_title); ?></h3>

        <div class="character-display">
            <?php foreach ($dialogue_characters as $id => $char): 
                // $id est la clé unique (e.g., 'asterix', 'obelix', 'panoramix')
            ?>
                <div id="character-<?php echo htmlspecialchars($id); ?>" 
                     class="character-box inactive" 
                     data-char="<?php echo htmlspecialchars($id); ?>">
                    
                    <img src="<?php echo htmlspecialchars($char['url']); ?>" 
                         alt="<?php echo htmlspecialchars($char['name']); ?>" 
                         id="img-<?php echo htmlspecialchars($id); ?>">
                    
                    <span class="character-name"><?php echo htmlspecialchars($char['name']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="dialogue-text-area">
            <p id="dialogue-line">Cliquez sur SUIVANT pour commencer...</p>
            <div class="controls-box">
                <span class="prompt-text">APPUYER</span>
                <div class="controls-text">...</div>
            </div>
        </div>

        <div class="controls-container">
            <button id="next-button">SUIVANT</button>
        </div>
        
        <button onclick="document.getElementById('dialogueModal').close()" class="close-button">&times;</button>
    </dialog>


    <script>
        // Utilisation de json_encode pour passer le tableau PHP au format JSON lisible par JavaScript
        const DIALOGUE_DATA = <?php echo json_encode($dialogue_scenes); ?>;
        
        // Liste des IDs des personnages pour l'initialisation du JavaScript
        const CHARACTER_IDS = [
            <?php 
            // Génère une liste JS de la forme: 'asterix', 'obelix'
            $ids = array_keys($dialogue_characters);
            echo "'" . implode("', '", array_map('htmlspecialchars', $ids)) . "'";
            ?>
        ];
        
        // J'ai besoin de réintégrer la partie "Chargement JSON" de votre script.
        // Puisque nous injectons les données directement ici, je vais la modifier.
        // (Voir la section 3 pour la version finale du JS)
    </script>
    <script src="dialogue.js"></script>
</body>
</html>