<?php
if($_POST){
    require "dbconnection.php";
    require "Class/DbRepo.php";
    
    echo json_encode(DbRepo::removeSong($_POST['id']));
}