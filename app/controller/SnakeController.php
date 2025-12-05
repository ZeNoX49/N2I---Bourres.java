<?php

class snakeController
{
    public function show()
    {
        $title = "Jeu du Serpent";
        include "app/view/header.php";
        include "app/view/snakeView.php";
        include "app/view/footer.php";
    }
}
