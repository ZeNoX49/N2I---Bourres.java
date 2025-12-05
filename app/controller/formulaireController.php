<?php

class formulaireController {

    public function show() {
        // Récupération sécurisée des données du formulaire (POST)
        $email = $_POST["email"] ?? "";
        $message = $_POST["message"] ?? "";

        // Initialisation du compteur de tentatives
        if (!isset($_SESSION["nb_tentatives_form"])) {
            $_SESSION["nb_tentatives_form"] = 0;
        }

        // Récupération des scores (cookies)
        $snake = isset($_COOKIE["snake_score"]) ? (int)$_COOKIE["snake_score"] : 0;
        $laser = isset($_COOKIE["lasergame_score"]) ? (int)$_COOKIE["lasergame_score"] : 0;

        // Objectifs requis
        $reqSnake = $_SESSION["required_snake_point"] ?? 0;
        $reqLaser = $_SESSION["required_lasergame_point"] ?? 0;

        // Vérification des scores minimum
        if ($snake < $reqSnake || $laser < $reqLaser) {
            $_SESSION["txt"] = "L'un des éléments n'est pas rempli pour pouvoir continuer l'aventure";
            // blocage volontaire côté serveur
            sleep(3);
            include "app/view/formulaireView.php";
            return;
        }

        // Message d'attente (blocage volontaire côté serveur)
        $_SESSION["txt"] = "Veuillez attendre quelques secondes, on s'assure juste de pouvoir vous spam";
        sleep(5);

        // Gestion de la victoire
        if ($message === "Félicitations, vous avez gagné !") {

            if ($_SESSION["nb_tentatives_form"] <= 3) {
                $_SESSION["txt"] = "Vous pensiez pas vous en sortir aussi bien... allez donc faire 2000 points au mini-jeu lasergame";

                $_SESSION["nb_lasergame_point"] = 0;
                $_SESSION["required_lasergame_point"] = 2000;

                // blocage volontaire avant retour à la vue
                sleep(3);
                include "app/view/formulaireView.php";
                $_SESSION["nb_tentatives_form"]++;
                return;
            } 
            else {
                $this->weWon();
                $_SESSION["nb_tentatives_form"]++;
                return;
            }
        }

        // Sinon, logique pour réinitialiser les mini-jeux tous les 3 essais
        if ($_SESSION["nb_tentatives_form"] % 3 === 0) {

            $_SESSION["txt"] = "Allez faire 100 points au snake et 2500 au lasergame";

            setcookie("snake_score", 0, time() + 3600, "/");
            setcookie("lasergame_score", 0, time() + 3600, "/");

            $_SESSION["required_snake_point"] = 100;
            $_SESSION["required_lasergame_point"] = 2500;

            // blocage volontaire avant affichage
            sleep(3);
            include "app/view/formulaireView.php";

        } else {
            $_SESSION["txt"] = "On vous laisse recommencer pour avoir la bonne réponse (Félicitations, vous avez gagné !)";
            // blocage volontaire avant affichage
            sleep(3);
            include "app/view/formulaireView.php";
        }

        // Incrémentation du compteur
        $_SESSION["nb_tentatives_form"]++;
    }

    // Fonction pour afficher le GIF et l'image en cas de victoire
    private function weWon() {
        $_SESSION["gif"] = "https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExaXFjaWUzcnM4YXpmMmNzenVvbmx5N3Blc2Nwc3p3MWowMnZ4dnVvNyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/5VKbvrjxpVJCM/giphy.gif";
        $_SESSION["img"] = "assets/image/monTheoAMOA.jpg";

        $_SESSION["txt"] = "(réaction victorieuse)";

        include "app/view/winView.php";

        // Nettoyage après affichage
        unset($_SESSION["gif"], $_SESSION["img"]);
    }
}