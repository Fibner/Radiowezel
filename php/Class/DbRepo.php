<?php
DbRepo::setDB($db);

class DbRepo
{
    private static $dbconn;

    public static function setDB(&$db)
    {
        self::$dbconn = $db;
    }
    public static function addSong(&$Song)
    {
        try {
            if (self::$dbconn->query("INSERT INTO `music`(`songId`, `title`, `date`, `link`, `thumbnail`, `viewCount`, `likeCount`, `dislikeCount`, `commentCount`) VALUES ('{$Song->songId}'," . '"' . $Song->title . '"' . ",'{$Song->date}','{$Song->link}','{$Song->thumbnail}',{$Song->viewCount},{$Song->likeCount},{$Song->dislikeCount},{$Song->commentCount})")) return true;
            else return false;
        } catch (Exception $e) {
            return false;
        }
    }
    public static function addSongToHistory(&$Song)
    {
        $date = new DateTime();
        $date = $date->format("Y-m-d H:i:s");
        try {
            self::$dbconn->query("UPDATE `history` SET status = 0 WHERE status = 1");
            if (self::$dbconn->query("INSERT INTO `history`(songId, date, status) VALUES ($Song, '$date', 1)")) return true;
            else return false;
        } catch (Exception $e) {
            return false;
        }
    }
    public static function getSong()
    {
        $musicResult = self::$dbconn->query("SELECT * FROM playlist ORDER BY id ASC LIMIT 1");
        foreach ($musicResult as $item) {
            $infoResult = self::$dbconn->query("SELECT id, songId FROM music WHERE id = {$item['musicId']}");
            $infoResult = $infoResult->fetch_assoc();
            return $infoResult;
        }
    }
    public static function getHistory($htmlbld)
    {
        if($htmlbld){
            $history = self::$dbconn->query("SELECT music.title, music.link, history.date, history.status FROM history INNER JOIN music ON history.songId = music.id ORDER BY history.id DESC");
            $html = "";
            foreach ($history as $item) {
                $color = "white";
                switch ($item['status']) {
                    case 0:
                        $item['status'] = "odtworzona";
                        $color = "white";
                        break;
                    case 1:
                        $item['status'] = "trwa...";
                        $color = "green";
                        break;
                }
                $html .= "<tr><td><a href='{$item['link']}' target='_blank'>{$item['title']}</a></td><td style='color: {$color}'>{$item['status']}</td><td>{$item['date']}</td></tr>";
            }
            echo $html;
        }else{
            $history = self::$dbconn->query("SELECT music.title FROM history INNER JOIN music ON history.songId = music.id ORDER BY history.id DESC LIMIT 1");
            $history = $history ->fetch_assoc();
            echo $history['title'];
        }
        
    }
    public static function removeSong(string $id)
    {
        if (self::$dbconn->query("DELETE FROM `playlist` WHERE musicId = {$id}"));
    }
    public static function checkIfItIs($songId)
    {
        $result = self::$dbconn->query("SELECT songId FROM music WHERE songId = '{$songId}'");
        if ($result->num_rows > 0) return true;
        return false;
    }
    public static function logIn($login, $password)
    {
        $result = self::$dbconn->query("SELECT id, login, password FROM users WHERE login = '{$login}'");
        if ($result->num_rows < 1) {
            echo json_encode(false);
            return;
        }
        $users = [];
        foreach ($result as $value) {
            $users = [[$value['id'], $value['login'], $value['password']]];
        }
        if (password_verify($password, $users[0][2])) {
            $_SESSION['user'] = serialize(new User($users[0][0], $users[0][1]));
            return json_encode(true);
        } else {
            return json_encode(false);
        }
    }
    public static function executeCommand($command){
        switch($command){
            case 'pause':
                self::$dbconn->query("DELETE FROM commands");
                self::$dbconn->query("INSERT INTO commands (command, executedBy) VALUES (0, 1)");
                break;
            case 'play':
                self::$dbconn->query("DELETE FROM commands");
                self::$dbconn->query("INSERT INTO commands (command, executedBy) VALUES (1, 1)");
                break;
            case 'next':
                self::$dbconn->query("INSERT INTO commands (command, executedBy) VALUES (2, 1)");
                break;
            case 'stop':
                self::$dbconn->query("INSERT INTO commands (command, executedBy) VALUES (3, 1)");
                break;
            case 'get':
                try{
                    $result = self::$dbconn->query("SELECT * FROM commands LIMIT 1")->fetch_assoc();
                    if($result != NULL){
                        echo $result["command"];
                        self::$dbconn->query("DELETE FROM commands");
                    }
                }catch(Exception $e){}
                break;
        }
    }
}
