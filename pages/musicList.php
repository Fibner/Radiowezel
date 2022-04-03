<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Lista piosenek</title>
</head>
<body>
    <table id="musicList">
        <tr>
            <th>URL</th>
            <th>Likes</th>
            <th>Dislikes</th>
            <th>Funkcje</th>
        </tr>

        <?php
             require "../php/dbconnection.php";

             $sql = "SELECT * FROM music;";
             $sql_data = $db -> query($sql);

             foreach($sql_data as $data){
                 echo("<tr>");
                    echo("<td>".$data['url']."</td>");
                    echo("<td>".$data['likes']."</td>");
                    echo("<td>".$data['dislikes']."</td>");
                    echo("<td><i id='orPlay' class='fa-thin fa-circle-play'></i></td>");
                 echo("</tr>");
             }

             $db ->close();
        ?>
    </table>
    <script src="../src/js/musicList-page.js"></script>
</body>
</html>