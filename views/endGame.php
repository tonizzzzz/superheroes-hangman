<?php include 'shared/header.php'; ?>
<link href="styles/endgame.css" rel="stylesheet" type="text/css">
<script src="scripts/themeController.js"></script>

<div class="container">
    <div class="header-title">
        <h1 class="gameTitle">SUPERHEROES HANGMAN</h1>
        <img class="responsive" src="src/img/HeaderFace.png" />
    </div>
    <div class="game-results">
        <!-- Resultado: Ganador o Perdedor -->
        <span class="result">
            <?= $_REQUEST['status'] == 'f' ? 'LOSER' : 'WINNER' ?>
        </span>
        <!-- Imagen "happy" o "angry" del superheroe, según resultado -->
        <img src="<?= $imgResult ?>" />
        <!-- Palabra oculta revelada -->
        <span class="superhero">SUPERHERO:<label class="heroselected"><?= $selectedHero ?></label></span>
    </div>
    <!-- Botones de control de juego y estilos -->
    <div class="game-buttons">
        <a href="index.php?action=playgame&amp;playagain=true">Play Again</a>
        <a href="index.php">New Game</a>
        <a href="#" id="btnStyleGame">Edit style</a>
    </div>
    <?php include 'shared/footer.php'; ?>
</div>