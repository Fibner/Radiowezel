<?php
$_POST['link'] = "https://www.youtube.com/watch?v=2-xPNdkRJvk";
if ($_POST) {
    session_start();
    require "dbconnection.php";
    require "key.php";

    if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
        if (isset($_POST['link']) && $_POST['link'] != "") {
            $link = $_POST['link'];
            if (checkLink($link)) {
                $songID = getID($link);
                try{
                    //NIE RUSZAĆ TU BO ŁAPSKA UTNE >:(
                    $response = json_decode(file_get_contents("https://youtube.googleapis.com/youtube/v3/videos?part=snippet%2Cstatistics&id={$songID}&key={$key}", true));
                    echo $response;
                    // foreach($response->items as $myitem){
                    //     echo $item;
                    // }
                }catch(Exception $e){
                    echo json_encode("err");
                }
                // $db->query();



                echo json_encode(true);
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

function getID($link){
    return substr($link, -11);
}
