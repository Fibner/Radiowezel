<?php

session_start();

include "dbconnection.php";
    $db -> query("DELETE FROM playlist;");

    $elementsId = $_POST['id'];
    $values = "";
    $x = 0;
    foreach($elementsId as $element){
        if($x == 0){
            $values .= "($element)";
        }else{
            $values .= ",($element)";
        }
        $x++;
    };
    $sql = "INSERT INTO playlist (musicId) VALUES ".$values.";";
    $db -> query($sql);
    




