<?php
session_start();
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    session_destroy();
}

echo json_encode(true);
header("Location: ../index");
