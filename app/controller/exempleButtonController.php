<?php

class exempleButtonController
{
    public function show()
    {
        $title = "Exemple";
        include "app/view/header.php";
        include "app/view/exempleButtonView.php";
        include "app/view/footer.php";
    }
}