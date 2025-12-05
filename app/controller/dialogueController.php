<?php

// ====================================================================
// I. DONNÉES BRUTES ET MAPPING DES PERSONNAGES
// ====================================================================

// --- 1. Simulation des données JSON (votre format actuel) ---
// Dans une application réelle, cette section serait remplacée par :
// $json_data = json_decode(file_get_contents('assets/json/dialogues.json'), true);
$json_data = [
    "Panoramix" => [
        "titre" => "La tavern'IDE VSCode",
        "text" => "Mes amis, pour concocter une application web efficace et légère, pas besoin de solution coûteuse comme la suite JetBrains.[Afficher le logo JetBrains]\nLe secret est dans l'outil libre, comme VSCode.[Afficher le logo VSCode] \nIl permet à chaque établissement scolaire de devenir autonome et de co-construire sa solution a l'aide d'une grande quantité d'extension faite par la communauté pour la communauté. C'est comme pour la Guilde des Druides et c'est ça l'essence du NIRD !"
    ],
    "Assurancetourix" => [
        "titre" => "l'Audio'péra avec Audacity",
        "text" => "[Accorde sa lyre] Écoutez-moi ça ! Pour enregistrer mes ballades, j'utilisais Adobe Audition, mais je fus dégouté lorsque je vis que les Romains l'avais truffé d'abonnements indésirables! , Maintenant, avec Audacity, j'ai toute la liberté de créer, c'est un logiciel leger et 100% gratuit ! Je peux y transmettre tous les plus beau accord de ma lyre grâce à NIRV !"
    ],
    "Abraracourcix & Bonnemine" => [
        "titre" => "Explication de NIRD",
        "text" => "Par Bélénos, Bonnemine ! Face à toutes ses licences écrasante de leur prix et de leur poids dans leur marché, ces Romains nous on mis en difficulté, Mais avec le NIRD, le Numérique Inclusif, Responsable et Durable, ces écoles sont à l'image de notre beau village : Irréductible! \n Exactement, mon Cochonnet ! Cette méthode c'est comme la potion magique ! \nElle permet de réemployer le matériel, promouvoir les logiciels libre comme Linux pour lutter contre l'obsolescence programmée , et s'assurer que nos données ne partent pas hors de l'UE! C'est la voie vers l'autonomie et l'écoresponsabilité!"
    ],
    "Falbala" => [
        "titre" => "La Vate Vidéaste",
        "text" => "Quelle horreur ces abonnements indispensables et ces écosystèmes fermés ! L'Empire des GAFAM de César veut contrôler notre créativité ! Pour un Numérique Durable, je passe à KdenLive ! C'est la solution pour mutualiser les ressources et co-construire des outils ouverts avec les autres membres de la communauté, je ne cautionne pas l'obsolescence programmée ! Surtout quand c'est pour justifier l'achat de la nouvelle version encore plus cher..."
    ],
    "Ordralfabétix" => [
        "titre" => "Le Poissonnier de la donnée prône la RGPD",
        "text" => "Mais ils sont fous ses Romains ! Ils stockent nos données n'importe où, même hors de l'UE? C'est comme le poisson, il faut qu'il soit frais et qu'on sache d'où il vient ! Avec la démarche NIRD, on favorise les solutions locales, ouvertes et autonomes pour un numérique plus éthique! Pas de poisson pas frais ni de données qui se baladent !"
    ],
    "Cétautomatix" => [
        "titre" => "La Forge de l'OS",
        "text" => "Moi, je dis qu'il y a urgence à agir contre la dépendance structurelle ! Rendre mon matériel obsolète juste parce qu'ils arrêtent le support de Windows ? Jamais ! Notre village résiste en favorisant le réemploi ! On installe LibreOffice et Linux, c'est la voie pour un Numérique Responsable et Durable qui renforce l'autonomie technologique ! Je suis toujours pas dépassé, alors pourquoi le matos le serait ?"
    ],
    "Agecanonix" => [
        "titre" => "Le Doyen de la Bureautique",
        "text" => "Mes chers amis, pourquoi payer une fortune pour des licences Microsoft 365 quand on peut utiliser LibreOffice ? C'est un logiciel libre, léger et complet qui permet de créer des documents, des feuilles de calcul et des présentations sans se ruiner. Avec LibreOffice, chaque école peut être autonome et responsable dans sa gestion numérique, tout en respectant la vie privée de ses utilisateurs !"
    ],
    "Astérix & Obélix" => [
        "titre" => "Les Guerriers du Dessin Libre",
        "text" => "C'est pas possible ! Tu dessines encore tes menhirs sur cette tablette qui ne veut rien laisser sortir ? C'est un écosystème fermé, ça ! Une vraie garnison romaine ! \n  Ouïe ! Tu as raison, il me faut toujours une licence coûteuse  pour exporter en bonne qualité. Mais que faire ? \n  Passe à Krita ! Il est libre de droit, on peut le mettre sur toutes nos machines, même celles que l'Empire veut rendre obsolètes ! C'est l'esprit de résistance des gaulois mais surtout l'esprit de résistance numérique propre à NIRD !"
    ]
];

// --- 2. Mapping Statique des Personnages ---
// Liste complète des acteurs avec leur ID unique et le chemin d'image.
$available_chars = [
    'Panoramix'      => ['id' => 'panoramix', 'name' => 'Panoramix', 'url' => 'assets/images/panoramix.png'],
    'Assurancetourix'=> ['id' => 'assurancetourix', 'name' => 'Assurancetourix', 'url' => 'assets/images/assurancetourix.png'],
    'Abraracourcix'  => ['id' => 'abraracourcix', 'name' => 'Abraracourcix', 'url' => 'assets/images/abraracourcix.png'],
    'Bonnemine'      => ['id' => 'bonnemine', 'name' => 'Bonnemine', 'url' => 'assets/images/bonnemine.png'],
    'Falbala'        => ['id' => 'falbala', 'name' => 'Falbala', 'url' => 'assets/images/falbala.png'],
    'Ordralfabétix'  => ['id' => 'ordralfabetix', 'name' => 'Ordralfabétix', 'url' => 'assets/images/ordralfabetix.png'],
    'Cétautomatix'   => ['id' => 'cetautomatix', 'name' => 'Cétautomatix', 'url' => 'assets/images/cetautomatix.png'],
    'Agecanonix'     => ['id' => 'agecanonix', 'name' => 'Agecanonix', 'url' => 'assets/images/agecanonix.png'],
    'Astérix'        => ['id' => 'asterix', 'name' => 'Astérix', 'url' => 'assets/images/asterix.png'],
    'Obélix'         => ['id' => 'obelix', 'name' => 'Obélix', 'url' => 'assets/images/obelix.png'],
];

// ====================================================================
// II. FONCTION DE CONVERSION DES DIALOGUES
// ====================================================================

/**
 * Convertit le format JSON simple (Nom du Personnage : Texte Long) en
 * un format séquentiel (Scènes et Locuteurs) nécessaire pour le moteur JS.
 *
 * @param array $json_data Les données brutes issues du fichier JSON.
 * @return array Les données transformées, indexées par des clés de dialogue uniques.
 */
function convert_to_sequential_dialogue(array $json_data, array $available_chars): array {
    $sequential_data = [];

    // Clés de dialogue basées sur les fonctionnalités pour les retrouver via le paramètre GET (e.g., ?type=os)
    $key_mapping = [
        'Panoramix' => 'ide',
        'Assurancetourix' => 'audio',
        'Abraracourcix & Bonnemine' => 'nird',
        'Falbala' => 'video',
        'Ordralfabétix' => 'rgpd',
        'Cétautomatix' => 'os',
        'Agecanonix' => 'bureautique', // On utilise 'bureautique' pour le doyen
        'Astérix & Obélix' => 'dessin',
    ];

    foreach ($json_data as $personnage_key => $dialogue) {
        $dialogue_key = $key_mapping[$personnage_key] ?? null;
        if (!$dialogue_key) continue;

        $actor_names = array_map('trim', explode(' & ', $personnage_key));
        $actors_data = [];
        $locuteurs_ids = []; 

        // 1. Déterminer les acteurs et leurs IDs
        foreach ($actor_names as $name) {
            if (array_key_exists($name, $available_chars)) {
                $char_info = $available_chars[$name];
                $actors_data[$char_info['id']] = $char_info;
                $locuteurs_ids[] = $char_info['id'];
            }
        }
        
        if (empty($actors_data)) continue;

        // 2. Transformer le texte en scènes séquentielles
        // Le texte est séparé par les sauts de ligne (\n).
        $raw_lines = array_filter(array_map('trim', explode("\n", $dialogue['text'])));
        $scenes = [];

        // Logique de locuteur : 
        // Si 1 seul acteur (dialogue solo) : il parle toujours.
        // Si > 1 acteur : on alterne entre les acteurs dans l'ordre où ils apparaissent dans $locuteurs_ids.
        $locuteur_index = 0;

        foreach ($raw_lines as $line) {
            $line = trim($line);
            if (empty($line)) continue;

            $current_speaker_id = $locuteurs_ids[0]; // Par défaut, le premier de la liste.
            
            if (count($locuteurs_ids) > 1) {
                // Alternance simple pour les dialogues multiples
                $current_speaker_id = $locuteurs_ids[$locuteur_index % count($locuteurs_ids)];
                $locuteur_index++;
            }
            
            $scenes[] = [
                'speaker' => $current_speaker_id,
                'text' => $line,
            ];
        }

        // 3. Assemblage de la structure finale
        $sequential_data[$dialogue_key] = [
            'title' => $dialogue['titre'],
            'characters' => $actors_data,
            'scenes' => $scenes,
        ];
    }
    
    return $sequential_data;
}

// ====================================================================
// III. LOGIQUE D'EXÉCUTION
// ====================================================================

// 1. Transformer les données brutes
$dialogue_data = convert_to_sequential_dialogue($json_data, $available_chars);

// 2. Déterminer le dialogue à afficher (via ?type=...)
$dialogue_type = $_GET['type'] ?? 'dessin'; // Par défaut, charger le dialogue 'dessin'

// 3. Sélectionner le dialogue
if (array_key_exists($dialogue_type, $dialogue_data)) {
    $current_dialogue = $dialogue_data[$dialogue_type];
} else {
    // Si la clé n'existe pas, charger une valeur par défaut de manière sécurisée
    $current_dialogue = reset($dialogue_data); 
}

// 4. Définir les variables pour la Vue
$dialogue_scenes = $current_dialogue['scenes'];
$dialogue_characters = $current_dialogue['characters'];
$dialogue_title = $current_dialogue['title'];


// --- Chargement de la Vue ---
include 'dialogue_view.php';