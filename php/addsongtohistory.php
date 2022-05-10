<?php

require "dbconnection.php";
require "Class/DbRepo.php";

echo json_encode(DbRepo::addSongToHistory($_POST["song"]));