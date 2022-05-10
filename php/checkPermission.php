<?php
session_start();
require_once "Class/User.php";
function checkPermission($lvl)
{
    // var_dump($_SERVER);
    // die();
    switch ($lvl) {
        case 0:
            if (!isset($_SESSION['user']) || unserialize($_SESSION['user'])->getType() != 0) {
                header("Location: /radiowezel/pages/login");
            }
            break;
        case 1:
            if (!isset($_SESSION['user']) || unserialize($_SESSION['user'])->getType() != 1) {
                header("Location: /radiowezel/pages/login");
            }
            break;
        case 2:
            if (!isset($_SESSION['user']) || unserialize($_SESSION['user'])->getType() != 2) {
                header("Location: /radiowezel/pages/login");
            }
            break;
    }
}
