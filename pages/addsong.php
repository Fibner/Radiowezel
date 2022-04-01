<?php
session_start();
if(!isset($_SESSION['admin']) || !$_SESSION['admin']){
    header("Location: pages/login");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9ec0aafe67.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../src/css/addsong-page.css">
    <title>Dodaj piosenkę do bazy</title>
</head>
<body>
    <div id="add-form">
        <label for="link">Link do youtube:</label><br>
        <input type="text" name="link" id="link-input"><br>
        <button id="submit-button">Dodaj</button>
    </div>
    <script src="../src/js/jquery-3.6.0.js"></script>
    <script type="module" src="../src/js/addsong-page.js"></script>
</body>
</html>