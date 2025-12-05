<?php
class homeController
{
    public function show()
    {
        $title = "Le Village";
        include "app/view/header.php";
        include "app/view/home.php";
        include "app/view/footer.php";
    }
}