<?php
session_start();
require "dbconnection.php";
require "Class/DbRepo.php";
require "Class/User.php";

if($_POST){
    DbRepo::requestVerdict($_POST['id'], $_POST['verdict']);
}