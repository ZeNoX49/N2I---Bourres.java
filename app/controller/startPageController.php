<?php
class startPageController
{
    public function show()
    {
        $title = "MA BITE";
        include "app/view/header.php";
        include "app/view/startView.php";
        include "app/view/footer.php";
    }
}