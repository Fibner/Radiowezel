<?php
session_start();
require "dbconnection.php";
require "Class/DbRepo.php";
require "Class/User.php";

if($_POST){

    if(isset($_POST['login']) && $_POST['login'] != "" && isset($_POST['password']) && $_POST['password'] != ""){
        $login = $_POST['login'];
        $password = $_POST['password'];
        echo DbRepo::logIn($login, $password);
    }else{
        echo json_encode(false);
    }
}
