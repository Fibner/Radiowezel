<?php
session_start();
if(!isset($_SESSION['admin']) || !$_SESSION['admin']){
    header("Location: pages/login");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9ec0aafe67.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../src/css/addsong-page.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Dodaj piosenkę do bazy</title>
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

    
    <div id="link-div">
        <br><br>
        <h1>Dodaj piosenke do playlisty</h1>
        <hr>
        <input type="text" name="link" id="link-input"  class="lin">
        <input type="button" class="Lbutton" name="button" id="add-button" value="Dodaj" />
    </div>

    <script src="../src/js/jquery-3.6.0.js"></script>
    <script type="module" src="../src/js/addsong-page.js"></script>
</body>
</html>