<?php
include 'dbconnection.php';

$id = intval($_GET['id']);
$page = intval($_GET['page']);

$sql = 'DELETE FROM bannedmusic WHERE id = '.$id.';';
$sql2 = 'DELETE FROM music WHERE id = '.$id.';';

if($page == 1){
    $db -> query($sql2);
    header("location: ../pages/musicList.php");
}else{
    $db -> query($sql);
    header("location: ../pages/bannedmusic.php");
}