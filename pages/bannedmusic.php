<?php
require_once "../php/checkPermission.php"; //session_start();
checkPermission("bannedMusicSite");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/musicList-page.css">
    <link rel="stylesheet" href="../src/css/button.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Lista zbanowanych piosenek</title>
</head>
<body>
    <div id="menu-section">
        <div id="index-div" class="menu-button-div">
            <input type="button" id="index-button" class="Pbutton" name="button" value="Główna" />
        </div>
        <div id="playlist-div" class="menu-button-div">
            <input type="button" id="add-button" class="Pbutton" name="button" value="Dodaj" />
        </div>
        <div id="playlist-div" class="menu-button-div">
            <input type="button" class="Pbutton" name="button" id="playlist-button" value="Playlista" />
        </div>
        <div id="logout-div" class="menu-button-div">
            <input type="button" id="logout-button" class="Wbutton" name="button" value="Wyloguj" />
        </div>
    </div>
    <h1>ZBANOWANE PIOSENKI</h1>
    <div id="button-div" class="menu-button-div">
        <input type="button" id="list-button" class="Zbutton" name="button" value="Lista piosenek" />
    </div>
    <div id="musicList-conteiner">
        <?php
            require "../php/dbconnection.php";
            $sql = 'SELECT * FROM bannedmusic;';

            $sql_data = $db -> query($sql);
            
            $i = 0;
            foreach($sql_data as $data){
                echo'<div class="listElement" id="element'.$i.'">';
                    echo'<div id="mainInfo">';
                        echo'<p id="elementTitle">'.$data['title'].'</p>';
                        echo'<div class="imgContainer"><img src="'.$data['thumbnail'].'" alt="miniaturka"></div>';

                        echo("
                            <div class='buttonContainer'>
                                <input type='button' class='ban-button' value='ODBANUJ' onclick='javascript:location.href=`../php/banUnban.php?id={$data['id']}&page=2`' />
                                <input type='button' class='delete-button' value='USUŃ' onclick='javascript:location.href=`../php/delete.php?id={$data['id']}&page=2`' />
                            </div>
                        ");
                
                    echo'</div>';
                    echo'<div class="elementInfo" id="info'.$i.'">';
                        echo'<p>Data wydania: '.$data['date'].'</p>';
                        echo'<p>Liczba wyświetleń: '.$data['viewCount'].'</p>';
                        echo'<p>Like: '.$data['likeCount'].'</p>';
                        echo'<p>Dislike: '.$data['dislikeCount'].'</p>';
                    echo'</div>';
                echo'</div>';
                $i++;  
            }; 
        ?>
    </div>

    <script src="../src/js/jquery-3.6.0.js"></script>
    <script src="../src/js/bannedMusic-page.js"></script>
</body>
</html>