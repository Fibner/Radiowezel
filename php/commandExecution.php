<?php
require "dbconnection.php";
require "Class/DbRepo.php";
if(isset($_POST) && isset($_POST['command'])){
    DbRepo::executeCommand($_POST['command']);
}
