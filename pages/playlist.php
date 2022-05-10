<?php
require_once "../php/checkPermission.php"; //session_start();
checkPermission(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/playlist-page.css">
    <link rel="stylesheet" href="../src/css/button.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Playlista</title>
</head>
<body>
    <div id="menu-section">
        <div id="index-div" class="menu-button-div">
            <input type="button" id="index-button" class="Pbutton" name="button" value="GŁÓWNA" />
        </div>
        <div id="playlist-div" class="menu-button-div">
            <input type="button" id="add-button" class="Pbutton" name="button" value="DODAJ" />
        </div>
        <div id="playlist-div" class="menu-button-div">
            <input type="button" class="Pbutton" name="button" id="list-button" value="LISTA" />
        </div>
        <div id="logout-div" class="menu-button-div">
            <input type="button" id="logout-button" class="Wbutton" name="button" value="WYLOGUJ" />
        </div>
    </div>

    <div id="functions">
        <div id="index-div" class="menu-button-div">
            <input type="button" id="save-button" class="FButton" name="button" value="ZAPISZ" />
        </div>

        <div id="index-div" class="menu-button-div">
            <input type="button" id="delete-button" class="FButton" name="button" value="USUŃ" />
        </div>

        <div id="index-div" class="menu-button-div">
            <input type="button" id="random-button" class="FButton" name="button" value="LOSOWO" />
        </div>
    </div>

    <div id="center">
        <div id="music-list" class="container">
        <h1>LISTA Z MUZYKĄ</h1>
            <?php
                require "../php/dbconnection.php";

                $sql = "SELECT id,title,thumbnail FROM music;";
                $sql2 ="SELECT musicId FROM playlist;";

                $sql_data = $db -> query($sql);
                $sql_checkData = $db -> query($sql2);

                $checkData = array();
                foreach($sql_checkData as $myData){
                    array_push($checkData, $myData['musicId']);
                }

                foreach($sql_data as $data){
                    if(in_array($data['id'], $checkData) != TRUE){
                        //echo('<p id= "'.$data['id'].'"class="draggable listElement" draggable="true">'.$data['title'].'</p>');

                        echo('
                            <div id= "'.$data['id'].'"class="draggable listElement" draggable="true">
                                <p>'.$data['title'].'</p>
                                <img src="'.$data['thumbnail'].'" alt="miniaturka">
                            </div>
                        ');
                    }
                };
            ?>
        </div>
        <div id="playlist-list" class="container">
            <h1>PLAYLISTA</h1>
            <?php
                require "../php/dbconnection.php";
                $sql = "SELECT music.id ,title,thumbnail FROM music INNER JOIN playlist ON music.id = playlist.musicId;";
                $sql_data = $db -> query($sql);

                foreach($sql_data as $data){
                    echo('
                            <div id= "'.$data['id'].'"class="draggable listElement" draggable="true">
                                <p>'.$data['title'].'</p>
                                <div class = "listElemtntImg"><img src="'.$data['thumbnail'].'" alt="miniaturka"></div>
                            </div>
                        ');
                };
            ?>
        </div>
    </div>
    


    <script src="../src/js/playlist-page.js"></script>
    <script src="../src/js/jquery-3.6.0.js"></script>
</body>
</html>