<?php

require_once "app/model/exempleModel.php"; // Using example model for now as we don't need specific DB logic yet

class SnakeController
{
    public function show()
    {
        include "app/view/snakeView.php";
    }
}
