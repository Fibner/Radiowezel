<?php
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
    header("Location: ../index");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/login-page.css">
    <script src="https://kit.fontawesome.com/9ec0aafe67.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="../src/css/button.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Logowanie</title>
</head>

<body>
    <p>LOGOWANIE</p>
    <section id="form-section">
   
        <form onsubmit="return false">
 
            <label for="login-input">LOGIN</label>
            <input type="text" name="login-input" id="login-input">
            <br>
            <label for="password-input">HASŁO</label>
            <input type="password" name="password-input" id="password-input">
            <br>
            <button id="submit" class="button">ZALOGUJ</button>
        </form>
    </section>
  

    <script src="../src/js/jquery-3.6.0.js"></script>
    <script defer="true" type="module" src="../src/js/login-page.js"></script>
</body>

</html>