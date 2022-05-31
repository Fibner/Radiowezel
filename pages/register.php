<?php
session_start();
require "../php/Class/User.php";

if (isset($_SESSION['user'])) {
    switch(unserialize($_SESSION['user'])->getType()){
        case 1:
            header("Location: controlpanel");
            break;
        case 2:
            header("Location: ../index");
            break;
        case 0:
            header("Location: addsong");
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/button.css">
    <link rel="stylesheet" href="../src/css/register-page.css">
    <title>REJESTRACJA</title>
</head>
<body>
    <p>REJESTRACJA</p>
    <section id="form-section">
        <form>
            <label for="newLogin">LOGIN</label>
            <input type="text" name="newLogin" id="newLogin">
            <br>
            <label for="newPassword">HASLO</label>
            <input type="password" name="newPassword" id="newPassword">
            <br>
            <label for="repetedNewPassword">HASLO</label>
            <input type="password" name="repetedNewPassword" id="repetedNewPassword">
            <br>
        </form>
        <button id="submit" class="button">ZAREJESTROJ SIE</button><br>
        <button class="button"><a href="login.php">LOGOWANIE</a></button>
    </section>
    <script src="../src/js/jquery-3.6.0.js"></script>
    <script defer="true" type="module" src="../src/js/register-page.js"></script>
</body>
</html>