/*
 * CONTROL DE CANTIDAD DE JUGADORES Y NOMBRES
 *
 * Genera tantos campos como cantidad de jugadores introduzcas
 * Input:
 *      nPlayers -> Nº de jugadores
 *      playerNames -> Nombre de jugadores
 * 
 */

$(function() {
    //Cuando el elemento nPlayers cambie de valor, crea las celdas correspondientes
    $("#nPlayers").on("change keyup keypress", function(e) {
        $(".playerNames").html("");
        if (this.value > 0) {
            let i = 0;
            //Generar tantas celdas como número introducido
            for (i = 0; i < this.value; i++) {
                $(".playerNames").append($(`<input name="players[]" required placeholder="Player ${i + 1}"></input>`))
            }
        }
    })
    $("#btnStartGame").on('click', function() {
        $("#formGame").submit();
    })
})