<?php include 'shared/header.php'; ?>
<link href="styles/playgame.css" rel="stylesheet" type="text/css">
<script src="scripts/playgame.js"></script>

<div class="container">
    <form action="playgame.php"> 
        <div class="header-title">
            <h1 class="playerTitle">Player:<span id="playerName"><?= ($playerName==""?"unknown player":$playerName) ?></span></h1>
            <div>            
                <h1 style="float: left;" class="gameTitle">SUPERHEROES HANGMAN</h1>
                <img style="float: right;" class="responsive" src="src/img/HeaderFace.png" />
            </div>
        </div>
        <div class="game-container">
            <div id="hangmanStatus">
                <img class="responsive" src="src/img/hangman/hangman1.png" />
            </div>
            <div id="hangmanHiden">
                <?= $underline ?>
            </div>
            <div id="hangmanLetters">FAILED LETTERS:<br /></div>
        </div>
    </form>
    <?php include 'shared/footer.php'; ?>
</div>