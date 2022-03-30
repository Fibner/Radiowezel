<?php
session_start();
if(isset($_POST['admin']) && $_POST['admin']){
    header("Location: ../index");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
</head>
<body>
    <form method="POST">
        <label for="login-input">Login</label>
        <input type="text" name="login-input" id="login-input">
        <br>
        <label for="password-input">Hasło</label>
        <input type="password" name="password-input" id="password-input">
        <br>
        <button type="submit" id="submit">Zaloguj</button>
    </form>

    <script src="../src/js/jquery-3.6.0.js"></script>
    <script src="../src/js/login-page.js"></script>
</body>
</html>