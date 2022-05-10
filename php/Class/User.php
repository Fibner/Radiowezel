<?php
User::setDB($db);

class User{
    private static $dbconn;
    private $id;
    private $type;
    public $login;

    public function __construct($id, $login) {
        $this->login = $login;
        $this->setType();
        $this->setId($id);
    }

    public static function setDB(&$db){
        self::$dbconn = $db;
    }

    private function setId($id)
    {
        $this->id = $id;
    }
    private function setType(){
        $this->type = self::$dbconn->query("SELECT type FROM users WHERE login = '{$this->login}'")->fetch_assoc()['type'];
    }

    public function getType(){
        return $this->type;
    }
    public function getId(){
        return $this->id;
    }
}