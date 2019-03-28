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
        <a href="actions/screenshot.php?password=<?= APPLICATION_PASSWORD ?>" class="button button7">Zrzut ekranu</a> <br>
        <a href="actions/poweroff.php?password=<?= APPLICATION_PASSWORD ?>" class="button button3">Wyłącz komputer</a> <br>
        <a href="actions/reboot.php?password=<?= APPLICATION_PASSWORD ?>" class="button button6">Uruchom ponownie</a> <br>
        <a href="actions/logout.php?password=<?= APPLICATION_PASSWORD ?>" class="button button2">Wyloguj użytkownika</a> <br>
        <a href="actions/cancel.php?password=<?= APPLICATION_PASSWORD ?>" class="button">Anuluj zamykanie</a> <br>
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
        <br> <br> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=0" class="button">Głośność: 0%</a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=10" class="button button2">Głośność: 10%</a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=20" class="button button3">Głośność: 20%</a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=30" class="button button6">Głośność: 30%</a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=40" class="button button7">Głośność: 40%</a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=50" class="button">Głośność: 50%</a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=60" class="button button2">Głośność: 60%</a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=70" class="button button3">Głośność: 70%</a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=80" class="button button6">Głośność: 80%</a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=90" class="button button7">Głośność: 90%</a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=100" class="button">Głośność: 100%</a> <br>
        <br> <br> <br>
            &copy; Fenek912 | 
            <a href="https://github.com/Fenek912/windows-remote-control" target="_blank" class="footerlink">GitHub</a>
        <br> <br>
    </div>
</body>
</html>
