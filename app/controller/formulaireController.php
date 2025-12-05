<?php

class formulaireController {
    public function show() {
        // $nom = $_GET["nom"];
        $email = $_GET["email"];
        // $sujet = $_GET["sujet"];
        $message = $_GET["message"];

        $_SESSION["required_snake_point"];
        $_SESSION["required_lasergame_point"];

        $txt = "Veuillez attendre quelques secondes,\non s'assure juste de pouvoir vous spam";

        sleep(5);

        if($message === "Félicitations, vous avez gagné !") {
            if($_SESSION["nb_tentavives_form"] <= 3) {
                $txt = "vous pensiez pas vous en sortir aussi bien tout de même, aller donc faire 2000 points a notre mini-jeu lasergame";
                $_SESSION["nb_lasergame_point"] = 0;
                $_SESSION["required_lasergame_point"] = 2000;
                sleep(3);
                return;
            }
            else {
                $this->weWon();
                return;
            }
        }
        
        else {
            if($_SESSION["nb_tentavives_form"] % 3 === 0) {
                $txt = "Puisque vous voulez pas nous faire gagné aller donc faire 100 points a notre mini-jeu snake et 2500 points a notre mini-jeu lasergame";
                $_SESSION["nb_snake_point"] = 0;
                $_SESSION["nb_lasergame_point"] = 0;
                $_SESSION["required_snake_point"] = 100;
                $_SESSION["required_lasergame_point"] = 2500;
                sleep(3);
                return;
            }
            else {
                $txt = "On vous laisse recommencer pour avoir la bonne réponse (Félicitations, vous avez gagné !)";
                sleep(3);
            }
        }

        $_SESSION["nb_tentavives_form"]++;
        include "app/view/formulaireView.php";
    }

    private function weWon() {
        $gif = "https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExaXFjaWUzcnM4YXpmMmNzenVvbmx5N3Blc2Nwc3p3MWowMnZ4dnVvNyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/5VKbvrjxpVJCM/giphy.gif";
        $img = "monTheoAMOA.jpg";
    }
}