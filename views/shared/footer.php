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
            <div class="modal-text">Letter color:</div>
            <div class="input-group">
                <input type="radio" class="bgColorBlack" name="letterColor" <?= ($theme["letterColor"] == 'black'?'checked':'') ?> value="black"/>
                <input type="radio" class="bgColorWhite" name="letterColor" <?= ($theme["letterColor"] == 'white'?'checked':'') ?> value="white"  />
                <input type="radio" class="bgColorRed" name="letterColor" <?= ($theme["letterColor"] == 'red'?'checked':'') ?> value="red" />
            </div>
            <div class="modal-text">Background color:</div>
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

</body>
</html>