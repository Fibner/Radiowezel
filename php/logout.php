<?php
//  if($_GET){
    session_start();
    if(1==1){
        if(isset($_SESSION["admin"])){
            unset($_SESSION['admin']);
            session_destroy();
        }
    }
    
    echo json_encode(true);
//  }