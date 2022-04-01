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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <title>Logowanie</title>
</head>

<body>
    <section id="menu-section">

    </section>
   
    <section id="form-section">
   
        <form onsubmit="return false">
        <p>Logowanie</p>
            <label for="login-input">Login</label>
            <input type="text" name="login-input" id="login-input">
            <br>
            <label for="password-input">Hasło</label>
            <input type="password" name="password-input" id="password-input">
            <br>
            <button id="submit" class="button">Zaloguj</button>
        </form>
    </section>
  

    <script src="../src/js/jquery-3.6.0.js"></script>
    <script defer="true" type="module" src="../src/js/login-page.js"></script>
</body>

</html>