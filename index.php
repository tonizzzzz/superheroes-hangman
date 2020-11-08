<?php

//Incluyo los archivos necesarios
require("./controllers/GameController.php");

//Instancio el controlador
$controller = new GameController;
$utils = new Utils;
$action = isset($_GET["action"]) ? $_GET["action"] : "";

switch ($action) {
    case 'playgame':
        $playAgain = isset($_GET["playagain"]) ? $_GET["playagain"] : false;
        $controller->playGame($_POST, $playAgain);
        break;
    case 'endgame':
        $controller->endGame($_REQUEST);
        break;
    case 'checkLetter':
        $utils->checkLetter($_POST);
        break;
    default:
        $controller->index();
        break;
}