<?php
class YoutubeAPI{
    private static $key = "AIzaSyBxuehPzwidUtunmeg-B-dp606aV4eZEGU";
    private static $apiResponse;

    private static function getSongID(&$link){
        return substr($link, -11);
    }
    private static function getSongTitle(){
        return self::$apiResponse["snippet"]["title"];
    }
    private static function getSongDate(){
        return self::$apiResponse["snippet"]["publishedAt"];
    }
    private static function getSongThumbnail(){
        return self::$apiResponse["snippet"]["thumbnails"]["default"]["url"];
    }
    private static function getSongViewCount(){
        if(self::$apiResponse["statistics"]["viewCount"]==null) return 0;
        return intVal(self::$apiResponse["statistics"]["viewCount"]);
    }
    private static function getSongLikeCount(){
        if(self::$apiResponse["statistics"]["likeCount"] == null) return 0;
        return intVal(self::$apiResponse["statistics"]["likeCount"]);
    }
    private static function getSongCommentCount(){
        if(self::$apiResponse["statistics"]["commentCount"] == null) return 0;
        return intVal(self::$apiResponse["statistics"]["commentCount"]);
    }
    private static function getSongCategoryId(){
        if(self::$apiResponse["snippet"]["categoryId"] == null) return 0;
        return intVal(self::$apiResponse["snippet"]["categoryId"]);
    }

    private static function sendRequest(&$id){
        $response = json_decode(file_get_contents("https://youtube.googleapis.com/youtube/v3/videos?part=snippet%2Cstatistics&id={$id}&key=".self::$key), true)["items"];
        if(count($response) < 1) return false;
        return json_decode(file_get_contents("https://youtube.googleapis.com/youtube/v3/videos?part=snippet%2Cstatistics&id={$id}&key=".self::$key), true)["items"][0];
    }
    private static function sendDislikeRequest(&$id){
        if(json_decode(file_get_contents("https://returnyoutubedislikeapi.com/votes?videoId={$id}"), true)["dislikes"] == null) return 0;
        return json_decode(file_get_contents("https://returnyoutubedislikeapi.com/votes?videoId={$id}"), true)["dislikes"];
    }
    
    public static function getSongInfo(&$link){
        $id = self::getSongID($link);
        self::$apiResponse = self::sendRequest($id);
        if(!self::$apiResponse) return false;
        $song = new Song();
        $song->songId = $id;
        $song->title = self::getSongTitle();
        $song->date = self::getSongDate();
        $song->link = $link;
        $song->thumbnail = self::getSongThumbnail();
        $song->viewCount = self::getSongViewCount();
        $song->likeCount = self::getSongLikeCount();
        $song->dislikeCount = self::sendDislikeRequest($id);
        $song->commentCount = self::getSongCommentCount();
        $song->categoryId = self::getSongCategoryId();
        return $song;
    }
}