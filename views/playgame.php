<?php include 'shared/header.php'; ?>
<link href="styles/playgame.css" rel="stylesheet" type="text/css">
<script src="scripts/playgame.js"></script>
<script src="scripts/utils.js"></script>

<div class="container">
    <form action="playgame.php">
        <div class="header-title">
            <!-- Nombre del jugador en turno -->
            <h1 class="playerTitle">Player:<span id="playerName"><?= ($playerName == "" ? "unknown player" : $playerName) ?></span></h1>
            <div>
                <h1 style="float: left;" class="gameTitle">SUPERHEROES HANGMAN</h1>
                <img style="float: right;" class="responsive" src="src/img/HeaderFace.png" />
            </div>
        </div>
        <div class="game-container">
            <!-- Imagen del ahorcado según el intento en el que estemos -->
            <div id="hangmanStatus">
                <img class="responsive" src="src/img/hangman/hangman1.png" />
            </div>
            <!-- Palabra oculta -->
            <div id="hangmanHiden">
                <?= $underline ?>
            </div>
            <!-- Contenedor de letras falladas -->
            <div id="hangmanLetters">FAILED LETTERS:<br /></div>
        </div>
    </form>
    <?php include 'shared/footer.php'; ?>
</div>