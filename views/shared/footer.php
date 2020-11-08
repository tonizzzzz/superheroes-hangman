<footer>Copyright - all right reserved</footer>

<div id="themeModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>SUPERHEROES HANGMAN</h2>
    </div>
    <div class="modal-body">
    <div class="game-form">
        <img src="src/img/PencilThor.png" />
        <div class="input-theme-fields">
            <label class="modal-text">Letter color:</label>
            <div class="input-group">
                <input type="radio" class="bgColorBlack" name="letterColor" <?= ($theme["letterColor"] == 'black'?'checked':'') ?> value="black"/>
                <input type="radio" class="bgColorWhite" name="letterColor" <?= ($theme["letterColor"] == 'white'?'checked':'') ?> value="white"  />
                <input type="radio" class="bgColorRed" name="letterColor" <?= ($theme["letterColor"] == 'red'?'checked':'') ?> value="red" />
            </div>
            <label class="modal-text">Background color:</label>
            <div class="input-group2">
                <input type="radio" class="bgColorBlack" name="backgroundColor" <?= ($theme["backgroundColor"] == 'black'?'checked':'') ?> value="black"/>
                <input type="radio" class="bgColorWhite" name="backgroundColor" <?= ($theme["backgroundColor"] == 'white'?'checked':'') ?> value="white" />
                <input type="radio" class="bgColorRed" name="backgroundColor" <?= ($theme["backgroundColor"] == 'red'?'checked':'') ?> value="red" />
            </div> 
        </div>
    </div>
    </div>
  </div>

</div>

<script>
    $(function(){
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

    $('input[name="backgroundColor"]').on("click", function(){
        $("body").get(0).style.setProperty("--main-bg-color", this.value);
        $.post('controllers/ThemeController.php', {backgroundColor: this.value });

    })
    $('input[name="letterColor"]').on("click", function(){
        $("body").get(0).style.setProperty("--main-text-color", this.value);
        $.post('controllers/ThemeController.php', {letterColor: this.value });
    })

});
</script>

</body>
</html>