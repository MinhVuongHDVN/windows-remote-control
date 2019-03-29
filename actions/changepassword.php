<?php

require_once("../config.php");

if(!isset($_GET["password"])) {
    exit("The password has not been entered or is incorrect!");
}

if($_GET["password"] != APPLICATION_PASSWORD) {
    exit("The password has not been entered or is incorrect!");
}

if(!isset($_GET["username"])) {
    exit("The password has not been entered or is incorrect!");
}

if(!isset($_GET["password1"])) {
    exit("The password has not been entered or is incorrect!");
}

if(!isset($_GET["password2"])) {
    exit("The password has not been entered or is incorrect!");
}

$color = '';

if(file_exists("../background")) {
    if(file_get_contents("../background") == "light") {
        $color = '<style>
            body {
                background-color: #f5f5f5;
            }
        </style> <meta name="theme-color" content="#f5f5f5">';
    }
    if(file_get_contents("../background") == "dark") {
        $color = '<style>
            body {
                background-color: #424242;
            }
        </style> <meta name="theme-color" content="#424242">';
    }
}

$html = '<!DOCTYPE html> <html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Windows Remote Control</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="shortcut icon" href="../remote-control.png"> ' . $color . '
    </head>
    <body>
        <h2>Hasła nie zgadzają się lub są za krótkie!</h2>
        <a href="../index.php?password=' . APPLICATION_PASSWORD . '" class="button button2">Powrót</a>
    </body>
</html>';

if(strlen($_GET["username"]) < 2) {
    exit($html);
}

if(strlen($_GET["password1"]) < 2) {
    exit($html);
}

if(strlen($_GET["password2"]) < 2) {
    exit($html);
}

if($_GET["password1"] != $_GET["password2"]) {
    exit($html);
}

shell_exec("start net.exe user " . $_GET["username"] . " " . $_GET["password1"]);

header("Location: ../index.php?password=" . APPLICATION_PASSWORD);

?>
