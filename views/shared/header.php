<?php 
if (session_id() == '') {
    session_start();
} 
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/styles.css" rel="stylesheet" type="text/css">
    <?php 
        if(isset($_SESSION["theme"])) { 
            $theme = unserialize($_SESSION["theme"]);
        }
    ?>
    <style>
        body {
        --main-bg-color: <?= $theme["backgroundColor"]??'red' ?>;
        --main-text-color: <?= $theme["letterColor"]??'white' ?>;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>