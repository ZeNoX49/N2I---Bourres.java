<?php

class dialogueController {
    public function show() {
        $list_dialogues = json_decode(file_get_contents("assets/json/dialogues.json"), true);
        $dialogues = "";

        $type = $_GET["type"];
        switch ($type) {
            case 'dessin' :
                $dialogues = $list_dialogues["mdessin"];
                break;

            case 'ide' :
                $dialogues = $list_dialogues["mide"];
                break;

            case 'media' :
                $dialogues = $list_dialogues["mmedia"];
                break;

            case 'rgpd' :
                $dialogues = $list_dialogues["mrgpd"];
                break;
        }

        include "app/view/dialogueView";
    }
}