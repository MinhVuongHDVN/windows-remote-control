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

if(strlen($_GET["username"]) < 2) {
    exit("The password has not been entered or is incorrect!");
}

if(strlen($_GET["password1"]) < 2) {
    exit("The password has not been entered or is incorrect!");
}

if(strlen($_GET["password2"]) < 2) {
    exit("The password has not been entered or is incorrect!");
}

if($_GET["password1"] != $_GET["password2"]) {
    exit("The password has not been entered or is incorrect!");
}

shell_exec("start net.exe user " . $_GET["username"] . " " . $_GET["password1"]);

header("Location: ../index.php?password=" . APPLICATION_PASSWORD);

?>
