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
    <table>
        <tr>
            <td>
                <img src="remote-control.png" width="64" height="64" alt="png" />
            </td>
            <td>
                <b>Windows Remote Control</b>
            </td>
        </tr>
    </table>
        <a href="actions/screenshot.php?password=<?= APPLICATION_PASSWORD ?>" class="button button7">Zrzut ekranu</a> <br>
        <a href="javascript:if(confirm('Czy na pewno chcesz wyłączyć komputer?')) { location.href='actions/poweroff.php?password=<?= APPLICATION_PASSWORD ?>' }" class="button button3">Wyłącz komputer</a> <br>
        <a href="javascript:if(confirm('Czy na pewno chcesz uruchomić ponownie komputer?')) { location.href='actions/reboot.php?password=<?= APPLICATION_PASSWORD ?>' }" class="button button6">Uruchom ponownie</a> <br>
        <a href="javascript:if(confirm('Czy na pewno chcesz wylogować użytkownika z systemu Windows?')) { location.href='actions/logout.php?password=<?= APPLICATION_PASSWORD ?>' }" class="button button2">Wyloguj użytkownika</a> <br>
        <a href="actions/cancel.php?password=<?= APPLICATION_PASSWORD ?>" class="button">Anuluj zamykanie</a> <br>
        <a href="actions/lock.php?password=<?= APPLICATION_PASSWORD ?>" class="button button6">Zablokuj komputer</a> <br>
        <a href="actions/closeapp.php?password=<?= APPLICATION_PASSWORD ?>" class="button button3">Zamknij aktywne okno</a> <br>
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
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=0" class="button">Głośność: <b>0%</b></a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=10" class="button button2">Głośność: <b>10%</b></a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=20" class="button button3">Głośność: <b>20%</b></a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=30" class="button button6">Głośność: <b>30%</b></a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=40" class="button button7">Głośność: <b>40%</b></a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=50" class="button">Głośność: <b>50%</b></a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=60" class="button button2">Głośność: <b>60%</b></a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=70" class="button button3">Głośność: <b>70%</b></a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=80" class="button button6">Głośność: <b>80%</b></a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=90" class="button button7">Głośność: <b>90%</b></a> <br>
        <a href="actions/volume.php?password=<?= APPLICATION_PASSWORD ?>&level=100" class="button">Głośność: <b>100%</b></a> <br>
        <br> <br> <br>
        <div id="password_management" style="display: none;">
            <form action="actions/changepassword.php" method="get">
                <table>
                    <tr>
                        <td>
                            <input type="hidden" name="password" value="<?= APPLICATION_PASSWORD ?>" />
                            Nazwa użytkownika: <br>
                            <input type="text" name="username" value="<?php echo str_replace("\n", "", shell_exec("echo %username%")); ?>"  maxlength="64" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nowe hasło: <br>
                            <input type="password" name="password1" maxlength="64" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Powtórz nowe hasło: <br>
                            <input type="password" name="password2" maxlength="64" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Zmień hasło" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="password_button">
            <a href="javascript:switcher();" class="button button7">Zmiana hasła Windows</a> <br>
        </div>
        <br> <br> <br>
            <b>&copy;</b> Fenek912 | v1.1 | 
            <a href="https://github.com/Fenek912/windows-remote-control" target="_blank" class="github">GitHub</a>
        <br> <br>
    <script>
        function switcher() {
            document.getElementById("password_management").style = "display: block;";
            document.getElementById("password_button").style = "display: none";
        }
    </script>
</body>
</html>
