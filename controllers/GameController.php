<?php
require("Utils.php");

class GameController
{
    public $items;

    public function __construct()
    {
        $data = @file_get_contents('src/data/listSH.json');
        // Almaceno en items de la clase GameController el json
        $this->items = json_decode($data, true);
    }
    public function index()
    {
        // Enviar a la vista principal
        require("views/index.php");
    }

    public function playGame($params, $playAgain = false)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $utils = new Utils();

        //Vaciamos de la sesión las variables de letras falladas y letras correctas para una nueva partida
        unset($_SESSION["wrongLetters"]);
        unset($_SESSION["rightLetters"]);

        // Almacenar en sesión el número de SuperHeroe (posición que ocupa en items)
        // * Random generado entre la posición 0 y la última recogida en items
        $randomSH               = rand(0, count($this->items) - 1);
        $_SESSION["SHNumber"]   = $randomSH;
        
        // Añadimos el heroe seleccionado a la sesión
        $_SESSION["selectedHero"] = $this->items[$randomSH]['name'];

        // Generar los espacios de la palabra a descubrir
        $underline = $utils->generateUnderlineWord($this->items, $randomSH);

        // Controlamos si venimos de PLAY AGAIN o de NEW GAME
        // * Añadimos a la sesión el número de jugadores y los nombres de los jugadores
        // * La variable $players es opcional, aunque nos irá mejor para posteriormente tratarla
        if (!$playAgain) {
            $_SESSION["nPlayers"]   = $params['nPlayers'];
            $_SESSION["players"]    = $params['players'];
            $players = $params['players'];
        } else {
            $players = $_SESSION["players"];
        }

        // Iniciamos el turno con el primer jugador y su nombre, recogido por la vista
        $_SESSION["currentPlayer"] = 0;
        $playerName = $players[0];

        // Enviar a la vista
        require("views/playgame.php");
    }

    public function endGame($params)
    {
        // Si no tenemos sesión abierta, la iniciamos
        if (session_id() == '') {
            session_start();
        }
        // Recuperar de la sesión:
        // * Posición que ocupa el superheroe escogido en el json, para posteriormente tratarlo
        $SHNumber = $_SESSION["SHNumber"];

        // * Nombre ded superheroe seleccionado
        $selectedHero = strtoupper($_SESSION["selectedHero"]);

        // Guardo la imagen de ganador o perdedor del superheroe del que estamos
        $imgResult = $params["status"] == 'f' ? $this->items[$SHNumber]["imgAngry"] : $this->items[$SHNumber]["imgHappy"];

        require("views/endgame.php");
    }
}
