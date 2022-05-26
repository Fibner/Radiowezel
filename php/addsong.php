<?php
if ($_POST) {
    session_start();
    require "dbconnection.php";
    require "Class/YoutubeAPI.php";
    require "Class/DbRepo.php";
    require "Class/Song.php";
    require "Class/User.php";

    if (isset($_SESSION['user'])) {
        if (isset($_POST['link']) && $_POST['link'] != "") {
            $link = $_POST['link'];
            if (checkLink($link)) {
                try{
                    $song = YoutubeAPI::getSongInfo($link);
                    if(DbRepo::checkIfItIs($song->songId)){
                        echo "is";
                        return;
                    } 
                    if(!$song){
                        echo json_encode(false);
                        return;
                    }
                    if($song->checkCategory()){
                        if(DbRepo::addSong($song)){
                            echo json_encode(true);
                            return;
                        }else{
                            echo "err";
                            return;
                        };
                    }else{
                        echo "wrg";
                        return;
                    }
                }catch(Exception $e){
                    echo "err";
                    return;
                }
            } else {
                echo json_encode(false);
                return;
            }
        } else {
            echo json_encode(false);
            return;
        }
    } else {
        session_destroy();
        header("Location: ../index");
    }
}

function checkLink(&$link)
{
    $correctLinks = ["https://www.youtube.com/watch?v=", "https://youtu.be/", "youtube.com/watch?v="];
    for ($i = 0; $i < count($correctLinks); $i++) {
        if (strlen($correctLinks[$i]) < strlen($link)) {
            if ($correctLinks[$i] == substr($link, 0, strlen($correctLinks[$i]))) {
                if (strlen(substr($link, strlen($correctLinks[$i]))) == 11) {
                    return true;
                }
            }
        }
    }
    return false;
}