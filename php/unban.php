<?php
include 'dbconnection.php';

$id = intval($_GET['id']);

$sql = 'SELECT * FROM bannedmusic WHERE id = '.$id.';';


$data = $db -> query($sql);


$saveData = $data -> fetch_assoc();


$songid = $saveData['songId'];
$title = $saveData['title'];
$date = $saveData['date'];
$link = $saveData['link'];
$thumbnail = $saveData['thumbnail'];
$viewCount = $saveData['viewCount'];
$likeCount = $saveData['likeCount'];
$dislike = $saveData['dislikeCount'];
$commentCount = $saveData['commentCount'];


$delete_sql = 'DELETE FROM bannedmusic WHERE id = '.$id.';';
$db -> query($delete_sql);

$save_sql = "INSERT INTO music (songId, title, date, link, thumbnail, viewCount, likeCount, dislikeCount, commentCount) VALUES ('{$songid}', '{$title}', '{$date}', '{$link}', '{$thumbnail}', '{$viewCount}', '{$likeCount}', '{$dislike}', '{$commentCount}')";
$db -> query($save_sql);


header("location: ../pages/bannedmusic.php");