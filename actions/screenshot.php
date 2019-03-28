<?php

require_once("../config.php");

if(!isset($_GET["password"])) {
    exit("The password has not been entered or is incorrect!");
}

if($_GET["password"] != APPLICATION_PASSWORD) {
    exit("The password has not been entered or is incorrect!");
}

shell_exec("cd .. && screenshot.exe");

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Windows Remote Control</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="shortcut icon" href="../remote-control.png">
</head>
<body>
    <div id="content">
        <img src="../screenshot.png">
        <a href="exitss.php?password=<?= APPLICATION_PASSWORD ?>" class="button button2">Powrót</a> <br>
        <a href="screenshot.php?password=<?= APPLICATION_PASSWORD ?>" class="button button6">Odśwież</a> <br>
    </div>
</body>
</html>
