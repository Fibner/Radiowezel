<?php
require_once "../php/checkPermission.php"; //session_start();
require_once "../php/dbconnection.php";
require_once "../php/Class/DbRepo.php";

checkPermission("usersListSite");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://kit.fontawesome.com/9ec0aafe67.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../src/css/request-page.css">
    <link rel="stylesheet" href="../src/css/button.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Prośby</title>
</head>

<body>
    <div id="menu-section">
        <div id="controlpanel-div" class="menu-button-div">
            <input type="button" class="Wbutton" name="button" id="controlpanel-button" value="PANEL" />
        </div>
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
    <h1>
        Użytkownicy
    </h1>
    <div id="users-container">
    </div>
    </div>
    <script src="../src/js/jquery-3.6.0.js"></script>
    <script type="module" src="../src/js/userslist-page.js"></script>
</body>

</html>