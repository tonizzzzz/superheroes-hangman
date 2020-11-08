<?php include 'shared/header.php'; ?>

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

<script type="text/javascript">
    $(function() {
        //Cuando el elemento nPlayers cambie de valor, crea las celdas correspondientes
        $("#nPlayers").on("change keyup keypress", function(e){
            $(".playerNames").html("");
            if (this.value > 0) {
                let i = 0;
                //Generar tantas celdas como número introducido
                for(i = 0; i < this.value; i ++) {
                    $(".playerNames").append( $(`<input name="players[]" required placeholder="Player ${i + 1}"></input>`) )
                }
            }
        })
        $("#btnStartGame").on('click', function() {
            $("#formGame").submit();
        })
    })
</script>


