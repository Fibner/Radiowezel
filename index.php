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
        <div id="playlist-div" class="menu-button-div">
            <input type="button" class="Pbutton" name="button" value="Playlista" />
        </div>
        <div id="logout-div" class="menu-button-div">
            <input type="button" class="Wbutton" name="button" value="Wyloguj" />
        </div>
    </div>

    
    <div id="link">
        <br><br>
        <h1>Dodaj piosenke do playlisty</h1>
        <hr>
        <input type="text" name="link" id="link"  class="lin">
        <input type="button" class="Lbutton" name="button" value="Dodaj" />
    </div>

    <script src="src/js/jquery-3.6.0.js"></script>
    <script src="src/js/index-page.js"></script>
</body>

</html>