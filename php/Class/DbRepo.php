<?php
DbRepo::setDB($db);

class DbRepo{
    private static $dbconn;

    public static function setDB(&$db){
        self::$dbconn = $db;
    }
    public static function addSong(&$Song){
        try{
            if(self::$dbconn -> query("INSERT INTO `music`(`songId`, `title`, `date`, `link`, `thumbnail`, `viewCount`, `likeCount`, `dislikeCount`, `commentCount`) VALUES ('{$Song->songId}',".'"'.$Song->title.'"'.",'{$Song->date}','{$Song->link}','{$Song->thumbnail}',{$Song->viewCount},{$Song->likeCount},{$Song->dislikeCount},{$Song->commentCount})")) return true;
            else return false;
        }catch(Exception $e){
            return false;
        }
    }
    public static function getSongToPlay(){
        $result = self::$dbconn -> query("SELECT * FROM music ORDER BY RAND() LIMIT 1");
        // var_dump($result);
        foreach($result as $item){
            return $item['songId'];
        }
    }
}