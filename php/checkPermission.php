<?php
session_start();
require_once "Class/User.php";
function checkPermission($site)
{
    // var_dump($_SERVER);
    // die();
    if (!isset($_SESSION['user'])){
        header("Location: /radiowezel/pages/login");
        return;
    }
    if(!unserialize($_SESSION['user'])->permissions[$site]){
        header("Location: /radiowezel/pages/login");
        return;
    }
    return;
}
