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
    public static function getSong(){
        $musicResult = self::$dbconn -> query("SELECT * FROM playlist ORDER BY id ASC LIMIT 1");
        foreach($musicResult as $item){
            $infoResult = self::$dbconn -> query("SELECT id, songId FROM music WHERE id = {$item['musicId']}");
            $infoResult = $infoResult->fetch_assoc();
            return $infoResult;
        }
    }
    public static function removeSong(string $id){
        if(self::$dbconn -> query("DELETE FROM `playlist` WHERE musicId = {$id}"));
    }
    public static function checkIfItIs($songId){
        $result = self::$dbconn -> query("SELECT songId FROM music WHERE songId = '{$songId}'");
        if($result->num_rows > 0) return true;
        return false;
    }
}