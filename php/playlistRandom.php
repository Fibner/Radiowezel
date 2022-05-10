<?php 
include "dbconnection.php";
include "playlistDelete.php";

$sql = "SELECT id FROM music ORDER BY rand() LIMIT 25;";
$random_Music = $db -> query($sql);


$values = "";
$x = 0;
foreach($random_Music as $element){
    if($x == 0){
        $values .= "(".$element['id'].")";
    }else{
        $values .= ",(".$element['id'].")";
    }
    $x++;
};
$sql = "INSERT INTO playlist (musicId) VALUES ".$values.";";
$db -> query($sql);

