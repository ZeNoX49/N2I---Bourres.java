<?php

class lasergameController
{
    public function show()
    {
        $title = "Jeu tir à la Cible";
        include "app/view/header.php";
        include (dirname(__FILE__, 3) . "/app/view/LaserGame.php");
        include "app/view/footer.php";
    }
}