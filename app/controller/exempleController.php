<?php

require_once $_ENV['BONUS_PATH'] . "app/model/exempleModel.php";

class exempleController
{
    public function show()
    {
        include $_ENV['BONUS_PATH'] . "app/view/exempleView.php";
    }
}