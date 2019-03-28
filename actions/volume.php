<?php

require_once("../config.php");

if(!isset($_GET["password"])) {
    exit("The password has not been entered or is incorrect!");
}

if($_GET["password"] != APPLICATION_PASSWORD) {
    exit("The password has not been entered or is incorrect!");
}

if(!isset($_GET["level"])) {
    exit("The password has not been entered or is incorrect!");
}

if(!is_numeric($_GET["level"])) {
    exit("The password has not been entered or is incorrect!");
}

shell_exec("cd sound && start set" . $_GET["level"] . ".vbs");

header("Location: ../index.php?password=" . APPLICATION_PASSWORD);

?>
