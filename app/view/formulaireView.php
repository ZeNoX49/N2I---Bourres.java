<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/formlaire.css">
    <title>Formulaire Modale</title>
    <link rel="stylesheet" href="assets/css/formulaire.css">
    <style>
        /* Petite mise en page pour le message et le GIF */
        #message {
            margin: 10px 0;
            font-weight: bold;
            color: #333;
        }
        #gif-box img {
            max-width: 300px;
            display: block;
            margin: 10px 0;
        }
    </style>
</head>
<body>

<div id="modal-overlay">
    <div id="modal-box">
        <!-- Message PHP -->
        <?php if(isset($_SESSION["txt"])): ?>
            <div id="message"><?= htmlspecialchars($_SESSION["txt"]) ?></div>
        <?php endif; ?>

        <!-- GIF et Image si gagné -->
        <?php if(isset($_SESSION["gif"]) && isset($_SESSION["img"])): ?>
            <div id="gif-box">
                <img src="<?= $_SESSION["gif"] ?>" alt="GIF victoire">
                <img src="<?= $_SESSION["img"] ?>" alt="Image victoire">
            </div>
        <?php endif; ?>

        <!-- Formulaire -->
        <form method="POST" action="index.php?action=formulaire">
            <div class="ligne">
                <input type="text" name="nom" placeholder="nom" required>
            </div>
            <div class="ligne">
                <input type="email" name="email" placeholder="mail" required>
            </div>
            <div class="ligne">
                <input type="text" name="sujet" placeholder="sujet" required>
            </div>
            <div class="ligne">
                <textarea rows="3" name="message" placeholder="message" required></textarea>
            </div>
            <button id="envoyer-btn" type="submit">Envoyer</button>
        </form>
    </div>
</div>

</body>
</html>