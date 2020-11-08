<?php include 'shared/header.php'; ?>
<script src="scripts/index.js"></script>
<script src="scripts/themeController.js"></script>

<div class="container">
    <form action="index.php?action=playgame" id="formGame" method="POST"> 
        <div class="header-images"><img class="responsive" src="src/img/header.png"/></div>
        <div class="header-title">
            <h1>SUPERHEROES HANGMAN</h1>
        </div>
        <div class="game-form">
            <div class="input-name">Nº PLAYERS</div>
            <div class="input-field">
                <input type="number" name="nPlayers" id="nPlayers" value="1" max="10" min="0" />
            </div>
            <div class="input-name" id="playersNamesTitle">PLAYERS NAMES</div>
            <div class="input-field playerNames" >
                <input type="text" name="players[]" placeholder="Player 1" required />
            </div>
        </div>
        <div class="game-buttons">
            <button id="btnStartGame">Start game</button>
            <button id="btnStyleGame">Edit style</button>
        </div>
    </form>
    <?php include 'shared/footer.php'; ?>
</div>
