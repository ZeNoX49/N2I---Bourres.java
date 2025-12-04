<?php
class exempleController
{
    public function show()
    {
        $title = "Exemple";
        include "app/view/header.php";
        include "app/view/exempleView.php";
        include "app/view/footer.php";
    }
}