$(function() {
    $("#btnStyleGame").on("click", function(e) {
        //Para que el evento no envíe nada
        e.preventDefault();

        // Get the modal
        var modal = document.getElementById("themeModal");
        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks on the button, open the modal
        modal.style.display = "block";

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });

    $('input[name="backgroundColor"]').on("click", function() {
        $("body").get(0).style.setProperty("--main-bg-color", this.value);
        $.post('controllers/ThemeController.php', { backgroundColor: this.value });

    })
    $('input[name="letterColor"]').on("click", function() {
        $("body").get(0).style.setProperty("--main-text-color", this.value);
        $.post('controllers/ThemeController.php', { letterColor: this.value });
    })

});