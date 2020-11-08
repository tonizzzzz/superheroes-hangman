<?php include 'shared/header.php'; ?>
<link href="styles/playgame.css" rel="stylesheet" type="text/css">
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

<script type="text/javascript">
    $(function(){
        let gameOver = false;
        $(document).keypress(function(e) {
            if(gameOver) { return; }
            var char = event.which || event.keyCode;
            $.post("index.php?action=checkLetter", { letter: String.fromCharCode(char) }, function(data) {
                var dataObj = JSON.parse(data);
                 console.log("POST RESPONSE", dataObj );
                 $("#hangmanHiden").html("");

                for(let i in dataObj.keyPlaceHolder) {
                    $("#hangmanHiden").append("<span>"+dataObj.keyPlaceHolder[i]+"</span>");
                }

                //Comprobar cuantos fallos llevamos
                if(dataObj.wrongLetters.length <= 5) {
                    if(dataObj.playerName) {
                        $("#playerName").html(dataObj.playerName);
                    }

                    $("#hangmanLetters").html("FAILED LETTERS: <br/>");
                    for(let i in dataObj.wrongLetters) {
                        $("#hangmanLetters").append("<span>"+dataObj.wrongLetters[i]+"</span>");
                    }

                    $("#hangmanStatus img").attr("src", "src/img/hangman/hangman"+(dataObj.wrongLetters.length + 1)+".png")
                }
                if(dataObj.wrongLetters.length >= 5) {
                    gameOver = true;
                    setTimeout(function(){
                        window.location = 'index.php?action=endgame&status=f';
                    }, 2000)
                } 

                if(dataObj.keyPlaceHolder.indexOf('_') == -1) {
                    window.location = 'index.php?action=endgame&status=w';
                }
            });


        });


    })
</script>