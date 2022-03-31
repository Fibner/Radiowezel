<?php
if($_POST){
    session_start();
    require "dbconnection.php";
        
    if(isset($_POST['login']) && $_POST['login'] != "" && isset($_POST['password']) && $_POST['password'] != ""){
        $login = $_POST['login'];
        $password = $_POST['password'];
    
         $result = $db->query("SELECT login, password FROM users WHERE login = '{$login}'");
         $users = [];
         foreach ($result as $value){
             $users = ["{$value['login']}"=>"{$value['password']}"];
         }
         if($users[$login] == $password){
             $_SESSION['admin'] = true;
         }
    }
}
