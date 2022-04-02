<?php
class Song{
    public $songId;
    public $title;
    public $date;
    public $link;
    public $thumbnail;
    public $viewCount;
    public $likeCount;
    public $dislikeCount;
    public $commentCount;
    public $categoryId;

    public function checkCategory(){
        if($this->categoryId == 10){
            return true;
        }
        return false;
    }
}