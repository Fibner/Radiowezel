<?php
session_start();
require "dbconnection.php";
require "Class/DbRepo.php";
require "Class/User.php";

if($_POST){
    // var_dump($_POST['id'], $_POST['verdict']);
    DbRepo::requestVerdict($_POST['id'], $_POST['verdict']);
}