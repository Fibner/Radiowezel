<?php
if($_POST){
    session_start();
    require "dbconnection.php";

    if(isset($_POST['login']) && $_POST['login'] != "" && isset($_POST['password']) && $_POST['password'] != ""){
        $login = $_POST['login'];
        $password = $_POST['password'];
        
         $result = $db->query("SELECT login, password FROM users WHERE login = '{$login}'");
         if($result->num_rows<1){
             echo json_encode(false);
             return;
         }
         $users = [];
         foreach ($result as $value){
             $users = ["{$value['login']}"=>"{$value['password']}"];
         }
         if(password_verify($password, $users[$login])){
             $_SESSION['admin'] = true;
             echo json_encode(true);
         }else{
            echo json_encode(false);
         }
    }else{
        echo json_encode(false);
    }
}
