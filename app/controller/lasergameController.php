<?php



class lasergameController
{
    public function show()
    {
        include (dirname(__FILE__, 3) . "/app/view/LaserGame.php");
    }
}