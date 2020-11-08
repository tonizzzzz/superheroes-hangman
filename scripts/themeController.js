$(function() {
    $("#btnStyleGame").on("click", function(e) {
        //Para que el evento no envíe nada
        e.preventDefault();

        // Llamada al modal
        var modal = document.getElementById("themeModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];

        // Abrir modal cuando el usuario pulse el botón
        modal.style.display = "block";

        // Cuando el usuario haga click fuera del modal, éste se cierra
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });

    // Gestion del cambio de color de fondo general
    $('input[name="backgroundColor"]').on("click", function() {
        $("body").get(0).style.setProperty("--main-bg-color", this.value);
        $.post('controllers/ThemeController.php', { backgroundColor: this.value });

    })

    // Gestion del cambio de color del texto general
    $('input[name="letterColor"]').on("click", function() {
        $("body").get(0).style.setProperty("--main-text-color", this.value);
        $.post('controllers/ThemeController.php', { letterColor: this.value });
    })

});