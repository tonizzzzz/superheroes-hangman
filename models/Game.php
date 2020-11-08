<?php

class Game
{
    //Variables o atributos
    var $gameOver;
    var $attempts;
    var $winner;
    var $numPlayers;
    var $lettersUsed;
    var $userName;


    function __construct($numPlayers)
    {
        $this->gameOver = false;
        $this->attempts = 5;
        $this->winner = false;
        $this->players = $numPlayers;
    }

    //Getters & Setters
    function setGameOver($gameOver)
    {
        $this->gameOver = $gameOver;
    }

    function getGameOver()
    {
        return $this->gameOver;
    }

    function setAttemps($attempts)
    {
        $this->attempts = $attempts;
    }

    function getAttemps()
    {
        return $this->attempts;
    }

    function setWinner($winner)
    {
        $this->winner = $winner;
    }

    function getWinner()
    {
        return $this->winner;
    }

    function setPlayers($numPlayers)
    {
        $this->players = $numPlayers;
    }

    function getPlayers()
    {
        return $this->players;
    }
}
