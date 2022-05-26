<?php
require_once "../php/checkPermission.php"; //session_start();
require_once "../php/dbconnection.php";
require_once "../php/Class/DbRepo.php";
checkPermission("historySite");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/history-page.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="../src/css/button.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Historia piosenek</title>
</head>

<body>
    <div id="menu-section">
        <?php
        if (unserialize($_SESSION["user"])->getType() == 1) {
            echo '<div id="index-div" class="menu-button-div">
                  <input type="button" id="index-button" class="Pbutton" name="button" value="GŁÓWNA" />
                  </div>
                  <div id="playlist-div" class="menu-button-div">
                  <input type="button" class="Pbutton" name="button" id="playlist-button" value="PLAYLISTA" />
                  </div>';
        }
        ?>
        <div id="playlist-div" class="menu-button-div">
            <input type="button" id="add-button" class="Pbutton" name="button" value="DODAJ" />
        </div>
        <div id="logout-div" class="menu-button-div">
            <input type="button" id="logout-button" class="Wbutton" name="button" id="logout-button" value="WYLOGUJ" />
        </div>
    </div><br>

    <h1>HISTORIA PIOSENEK</h1>
    <br>
    <div id="musicList-conteiner">
        <table>
            <tr>
                <th>Piosenka</th>
                <th>Status</th>
                <th>Data puszczenia</th>
            </tr>
            <?php
            DbRepo::getHistory(true);
            ?>
        </table>
    </div>
    <script src="../src/js/jquery-3.6.0.js"></script>
    <script src="../src/js/history-page.js"></script>
</body>

</html>