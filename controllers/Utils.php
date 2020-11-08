<?php
class Utils
{
    // Generar los espacios para la palabra a adivinar
    public function generateUnderlineWord($items, $randomSH)
    {
        $underline = "";
        for ($i = 0; $i < strlen($items[$randomSH]['name']); $i++) {
            if (ctype_alpha($items[$randomSH]['name'][$i])) {
                $underline .= '<span class="underline_char">_</span>';
            } else if (ctype_space($items[$randomSH]['name'][$i])) {
                $underline .= '<span>&nbsp;</span>';
            } else {
                $underline .= '<span>' . $items[$randomSH]['name'][$i] . '</span>';
            }
        }
        return $underline;
    }

    // Comprobar la letra introducida
    function checkLetter($params)
    {
        session_start();
        $currentPlayer  = $_SESSION["currentPlayer"];
        $players        = $_SESSION['players'];
        $nPlayers       = $_SESSION['nPlayers'];
        $wrongLetters   = [];
        $rightLetters   = [];
        $selectedHero   = strtoupper($_SESSION["selectedHero"]);
        $letter         = strtoupper($params['letter']);
        $response       = array();
        
        if (isset($_SESSION["wrongLetters"])) {
            $wrongLetters = unserialize($_SESSION["wrongLetters"]);
        }
        if (isset($_SESSION["rightLetters"])) {
            $rightLetters = unserialize($_SESSION["rightLetters"]);
        }

        if (!in_array($letter, $wrongLetters) && strpos($selectedHero, $letter) === false) {
            $wrongLetters[] = $letter;
        }

        // Si la letra introducida es correcta, damos respuesta true y la añadimos a "letras correctas"
        if (strpos($selectedHero, $letter) !== false) {
            $response["exist"] = true;
            if (!in_array($letter, $rightLetters)) {
                $rightLetters[] = $letter;
            }
            // Si la letra introducida NO está en la palabra oculta
        } else {
            $response["exist"] = false;
            if ($currentPlayer == ($nPlayers - 1)) {
                $currentPlayer = 0;
            } else {
                $currentPlayer++;
            }
            $_SESSION["currentPlayer"] = $currentPlayer;
        }

        $_SESSION["wrongLetters"] = serialize($wrongLetters);
        $_SESSION["rightLetters"] = serialize($rightLetters);

        $response["wrongLetters"] = $wrongLetters;
        $response["rightLetters"] = $rightLetters;
        $response["keyPlaceHolder"] = [];

        for ($i = 0; $i < strlen($selectedHero); $i++) {
            if ($selectedHero[$i] == ' ' || $selectedHero[$i] == '-') {
                $response["keyPlaceHolder"][$i] = $selectedHero[$i];
                continue;
            }

            if (in_array($selectedHero[$i], $rightLetters)) {
                $response["keyPlaceHolder"][$i] = $selectedHero[$i];
            } else {
                $response["keyPlaceHolder"][$i] = "_";
            }
        }

        $response["playerName"] = $players[$currentPlayer];
        echo json_encode($response);
    }
}
