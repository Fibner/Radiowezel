<?php 
include "dbconnection.php";
include "playlistDelete.php";

$sql = "SELECT id FROM music";
$sql_data = $db -> query($sql);

$musicArray = array();

$dataArray = array();
$howManyElements = 0;
$howManyMusics = 0;

foreach($sql_data as $data){
    $howManyElements++;
    array_push($dataArray, $data['id']);
}

if($howManyElements < 10){
    $howManyMusics = (round($howManyElements/2));
}else{
    $howManyMusics = 10;
}

for($i = 0; $i <= $howManyMusics; $i++){ // zrobić sprawdzanie czy wylosowane id występuje w bazie danych
    $random = rand(0,$howManyMusics);

    while(in_array($random, $musicArray) == TRUE){
        $random = rand(0,$howManyMusics);
    }

    array_push($musicArray, $random);
}

var_dump($howManyElements);
var_dump($howManyMusics);
var_dump($dataArray);


$values = "";
$x = 0;
foreach($musicArray as $element){
    if($x == 0){
        $values .= "($element)";
    }else{
        $values .= ",($element)";
    }
    $x++;
};
$sql = "INSERT INTO playlist (musicId) VALUES ".$values.";";
$db -> query($sql);

