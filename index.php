<?php
session_start();
if(!isset($_POST['admin']) || !$_POST['admin']){
    header("Location: pages/login");
}
?>