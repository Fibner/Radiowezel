<?php
if($_POST){
    session_start();
    require "dbconnection.php";

    if(isset($_POST['login']) && $_POST['login'] != "" && isset($_POST['password']) && $_POST['password'] != ""){
        $login = trim($_POST['login']);
        $password = trim($_POST['password']);
        echo trim("siema joł");
        return;
         $result = $db->query("SELECT login, password FROM users WHERE login = '{$login}'");
         if($result->num_rows<1){
             echo json_encode(false);
             return;
         }
         $users = [];
         foreach ($result as $value){
             $users = ["{$value['login']}"=>"{$value['password']}"];
         }
         if($users[$login] == $password){
             $_SESSION['admin'] = true;
             echo json_encode(true);
         }else{
            echo json_encode(false);
         }
    }else{
        echo json_encode(false);
    }
}
