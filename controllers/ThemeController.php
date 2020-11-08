<?php
    session_start();

    //Si tenemos theme en sesión, lo obtenemos
    if (isset($_SESSION["theme"])) {
        $theme = unserialize($_SESSION["theme"]);
    }

    if (isset($_POST['backgroundColor'])) {
        $theme["backgroundColor"] = $_POST['backgroundColor'];
    }

    if (isset($_POST['letterColor'])) {
        $theme["letterColor"] = $_POST['letterColor'];
    }

    $_SESSION["theme"] = serialize($theme);
