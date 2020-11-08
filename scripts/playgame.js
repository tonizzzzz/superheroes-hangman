/*
 * CONTROL DEL JUEGO
 *
 * Comprueba las letras introducidas y determina el resultado
 *      a) Letra pulsada correcta
 *          - Sigue jugando mismo jugador.
 *          - Rellena los huecos ocultos con la letra correcta.
 *      a) Letra pulsada incorrecta
 *          - Cambio de turno de jugador o perdida de partida 
 *            si llegas al máximo de intentos.
 *          - Añade la letra fallida al contenedor "Failed Letters".
 * Input:
 *      keyPress -> Tecla presionada
 * 
 */


$(function() {
    let gameOver = false;
    $(document).keypress(function(e) {
        if (gameOver) { return; }
        var char = event.which || event.keyCode;
        $.post("index.php?action=checkLetter", { letter: String.fromCharCode(char) }, function(data) {
            var dataObj = JSON.parse(data);
            $("#hangmanHiden").html("");
            for (let i in dataObj.keyPlaceHolder) {
                $("#hangmanHiden").append("<span>" + dataObj.keyPlaceHolder[i] + "</span>");
            }

            //Comprobar cuantos fallos llevamos
            if (dataObj.wrongLetters.length <= maxAttemps) {
                if (dataObj.playerName) {
                    $("#playerName").html(dataObj.playerName);
                }
                $("#hangmanLetters").html("FAILED LETTERS: <br/>");
                for (let i in dataObj.wrongLetters) {
                    $("#hangmanLetters").append("<span>" + dataObj.wrongLetters[i] + "</span>");
                }
                $("#hangmanStatus img").attr("src", "src/img/hangman/hangman" + (dataObj.wrongLetters.length + 1) + ".png")
            }

            if (dataObj.wrongLetters.length >= maxAttemps) {
                gameOver = true;
                var _gameOverSound = new Sound("src/soundsFX/gameover.mp3", 100, false);
                _gameOverSound.start();
                setTimeout(function() {
                    window.location = 'index.php?action=endgame&status=f';
                }, 3000)
            }
            if (dataObj.keyPlaceHolder.indexOf('_') == -1) {
                window.location = 'index.php?action=endgame&status=w';
            }
        });
    });
})