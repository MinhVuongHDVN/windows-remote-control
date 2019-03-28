<?php

require_once("config.php");

if(!isset($_GET["password"])) {
    exit("The password has not been entered or is incorrect!");
}

if($_GET["password"] != APPLICATION_PASSWORD) {
    exit("The password has not been entered or is incorrect!");
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Windows Remote Control</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="shortcut icon" href="remote-control.png">
    <?php
        if(file_exists("background")) {
            if(file_get_contents("background") == "light") {
                echo '<style>
                    body {
                        background-color: #f5f5f5;
                    }
                </style> <meta name="theme-color" content="#f5f5f5">';
            }
            if(file_get_contents("background") == "dark") {
                echo '<style>
                    body {
                        background-color: #424242;
                    }
                </style> <meta name="theme-color" content="#424242">';
            }
        }
    ?>
</head>
<body>
    <div id="content">
        <a href="actions/screenshot.php?password=<?= APPLICATION_PASSWORD ?>" class="button button2">Zrzut ekranu</a> <br>
        <a href="actions/poweroff.php?password=<?= APPLICATION_PASSWORD ?>" class="button button3">Wyłącz komputer</a> <br>
        <a href="actions/reboot.php?password=<?= APPLICATION_PASSWORD ?>" class="button button6">Uruchom ponownie</a> <br>
        <a href="actions/logout.php?password=<?= APPLICATION_PASSWORD ?>" class="button button2">Wyloguj użytkownika</a> <br>
        <a href="actions/cancel.php?password=<?= APPLICATION_PASSWORD ?>" class="button button2">Anuluj zamykanie</a> <br>
        <?php
            if(file_exists("background")) {
                if(file_get_contents("background") == "light") {
                    echo '<a href="actions/dark.php?password=' . APPLICATION_PASSWORD . '" class="button button5">Przełącz na ciemny</a> <br>';
                }
                if(file_get_contents("background") == "dark") {
                    echo '<a href="actions/light.php?password=' . APPLICATION_PASSWORD . '" class="button button4">Przełącz na jasny</a> <br>';
                }
            }
        ?>
    </div>
</body>
</html>
