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
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="shortcut icon" href="../remote-control.png">
    <?php
        if(file_exists("../background")) {
            if(file_get_contents("../background") == "light") {
                echo '<style>
                    body {
                        background-color: #f5f5f5;
                    }
                </style> <meta name="theme-color" content="#f5f5f5">';
            }
            if(file_get_contents("../background") == "dark") {
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
    <table>
        <tr>
            <td colspan="2">
                <img src="../screenshot.png" alt="png" />
            </td>
        </tr>
        <tr>
            <td>
                <a href="exitss.php?password=<?= APPLICATION_PASSWORD ?>" class="button button2">Powrót</a>
            </td>
            <td>
                <a href="screenshot.php?password=<?= APPLICATION_PASSWORD ?>" class="button button6">Odśwież</a>
            </td>
        </tr>
    </table>
</body>
</html>
