<?php
session_start();
if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    header("Location: pages/login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="src/css/index-page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div id="menu-section">
        <div id="add-div" class="menu-button-div">
            <input type="button" class="Pbutton" name="button" id="add-button" value="Dodaj" />
        </div>
        <div id="playlist-div" class="menu-button-div">
            <input type="button" class="Pbutton" name="button" id="playlist-button" value="Playlista" />
        </div>
        <div id="playlist-div" class="menu-button-div">
            <input type="button" class="Pbutton" name="button" id="list-button" value="Lista" />
        </div>
        <div id="logout-div" class="menu-button-div">
            <input type="button" class="Wbutton" name="button" id="logout-button" value="Wyloguj" />
        </div>
    </div>
    <div id="panel">
        <div id="player" class="panel-item"></div>
        <div id="placeholder" class="panel-item"></div>
        <div id="subpanel" class="panel-item">
            <div id="subpanel-top">
                <label for="manual">Manual</label>
                <input type="radio" id="manual" name="type" value="false">
                |
                <label for="auto">Auto</label>
                <input type="radio" id="auto" name="type" value="true">
                <br>
                <br>
                <input type="button" id="emergency" value="Awaryjny stop">
            </div>
            <div id="subpanel-down">
               <span id="counter">NaN</span>
            </div>
        </div>
    </div>
    <script src="src/js/jquery-3.6.0.js"></script>
    <script src="src/js/index-page.js"></script>
</body>

</html>