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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Document</title>
</head>
<body>
    <table id="musicList">
        <tr>
            <th>URL</th>
            <th>Likes</th>
            <th>Dislikes</th>
            <th>OrPlay</th>
        </tr>

        <?php
             require "php/dbconnection.php";

             $sql = "SELECT * FROM music;";
             $sql_data = $db -> query($sql);

             foreach($sql_data as $data){
                 echo("<tr>");
                    echo("<td>".$data['url']."</td>");
                    echo("<td>".$data['likes']."</td>");
                    echo("<td>".$data['dislikes']."</td>");
                    echo("<td>".$data['orPlay']."</td>");
                 echo("</tr>");
             }

             $db ->close();
        ?>
    </table>
    <button id="musicPlayer">Odtwarzacz muzyki</button>
    <button id="logout-button">Wyloguj</button>
    <script src="src/js/jquery-3.6.0.js"></script>
    <script src="src/js/index-page.js"></script>
</body>
</html>