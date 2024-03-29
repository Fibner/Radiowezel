<?php
require_once "../php/checkPermission.php"; //session_start();
require_once "../php/Class/User.php";
checkPermission("addSongSite");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9ec0aafe67.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../src/css/addsong-page.css">
    <link rel="stylesheet" href="../src/css/button.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Dodaj piosenkę do bazy</title>
</head>

<body>
    <div id="menu-section">
        <?php
        if(unserialize($_SESSION['user'])->getType() == 1 || unserialize($_SESSION['user'])->login == "kpieczka"){
            echo '<div id="index-div" class="menu-button-div">
            <input type="button" id="index-button" class="Pbutton" name="button" value="GŁÓWNA" />
        </div>
        <div id="playlist-div" class="menu-button-div">
            <input type="button" id="playlist-button" class="Pbutton" name="button" value="PLAYLISTA" />
        </div>
        <div id="list-div" class="menu-button-div">
            <input type="button" class="Pbutton" name="button" id="list-button" value="LISTA" />
        </div>';
        }
        ?>
        <div id="history-div" class="menu-button-div">
            <input type="button" class="Wbutton" name="button" id="history-button" value="HISTORIA" />
        </div>
        <div id="logout-div" class="menu-button-div">
            <input type="button" class="Wbutton" name="button" id="logout-button" value="WYLOGUJ" />
        </div>
    </div>


    <div id="link-div">
        <div>
            <h1>DODAJ PIOSENKĘ DO LISTY</h1>
            <span>(beta)</span>
        </div>
        <hr>
        <input type="text" name="link" id="link-input" class="lin">
        <input type="button" class="Lbutton" name="button" id="add-button" value="DODAJ" />
    </div>

    <script src="../src/js/jquery-3.6.0.js"></script>
    <script type="module" src="../src/js/addsong-page.js"></script>
</body>

</html>