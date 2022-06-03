<?php
require 'Class/Song.php';
require 'Class/YoutubeAPI.php';

var_dump(YoutubeAPI::getSongInfo($_GET['link']));