<?php
require "../php/checkPermission.php"; //sestion_start();
require "../php/dbconnection.php";
require "../php/Class/DbRepo.php";
checkPermission(1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://kit.fontawesome.com/9ec0aafe67.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../src/css/controlpanel-page.css">
    <link rel="stylesheet" href="../src/css/button.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Panel sterowania</title>
</head>

<body>
    <div id="mobile-menu">
        <div id="mobile-menu-icon"> > </div>
        <div id="mobile-menu-tab">
            <div id="mobile-menu-buttons">
                <input type="button" class="mobile-menu-button" name="button" id="add-button" value="DODAJ" />
                <br>
                <input type="button" class="mobile-menu-button" name="button" id="playlist-button" value="PLAYLISTA" />
                <br>
                <input type="button" class="mobile-menu-button" name="button" id="list-button" value="LISTA" />
                <br>
                <input type="button" class="mobile-menu-button" name="button" id="history-button" value="HISTORIA" />
                <br>
                <input type="button" class="mobile-menu-button" name="button" id="logout-button" value="WYLOGUJ" />
            </div>
        </div>
    </div>
    <div id="menu-section">
        <div id="add-div" class="menu-button-div">
            <input type="button" class="Pbutton" name="button" id="add-button" value="DODAJ" />
        </div>
        <div id="playlist-div" class="menu-button-div">
            <input type="button" class="Pbutton" name="button" id="playlist-button" value="PLAYLISTA" />
        </div>
        <div id="list-div" class="menu-button-div">
            <input type="button" class="Pbutton" name="button" id="list-button" value="LISTA" />
        </div>
        <div id="history-div" class="menu-button-div">
            <input type="button" class="Wbutton" name="button" id="history-button" value="HISTORIA" />
        </div>
        <div id="logout-div" class="menu-button-div">
            <input type="button" class="Wbutton" name="button" id="logout-button" value="WYLOGUJ" />
        </div>
    </div>

    <div id="main">
        <div>Teraz odtwarzane:</div>
        <div id="now-playing"><?php DbRepo::getHistory(false) ?></div>
        <div id="main-buttons">
            <button id="pause">Zatrzymaj</button>
            <br>
            <button id="play">Wznów</button>
            <br>
            <button id="next">Następny</button>
        </div>
    </div>
    <script src="../src/js/jquery-3.6.0.js"></script>
    <script type="module" src="../src/js/controlpanel-page.js"></script>
</body>

</html>