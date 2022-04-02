<?php
class YoutubeAPI{
    private static $key = "AIzaSyBxuehPzwidUtunmeg-B-dp606aV4eZEGU";
    private static $apiResponse;

    private function getSongID(&$link){
        return substr($link, -11);
    }
    private function getSongTitle(){
        return self::$apiResponse["snippet"]["title"];
    }
    private function getSongDate(){
        return self::$apiResponse["snippet"]["publishedAt"];
    }
    private function getSongThumbnail(){
        return self::$apiResponse["snippet"]["thumbnails"]["default"]["url"];
    }
    private function getSongViewCount(){
        return intVal(self::$apiResponse["statistics"]["viewCount"]);
    }
    private function getSongLikeCount(){
        return intVal(self::$apiResponse["statistics"]["likeCount"]);
    }
    private function getSongCommentCount(){
        return intVal(self::$apiResponse["statistics"]["commentCount"]);
    }
    private function getSongCategoryId(){
        return intVal(self::$apiResponse["snippet"]["categoryId"]);
    }

    private function sendRequest(&$id){
        return json_decode(file_get_contents("https://youtube.googleapis.com/youtube/v3/videos?part=snippet%2Cstatistics&id={$id}&key=".self::$key), true)["items"][0];
    }
    private function sendDislikeRequest(&$id){
        return json_decode(file_get_contents("https://returnyoutubedislikeapi.com/votes?videoId={$id}"), true)["dislikes"];
    }
    
    public static function getSongInfo(&$link){
        $id = self::getSongID($link);
        self::$apiResponse = self::sendRequest($id);
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