<?php
User::setDB($db);

class User{
    private static $dbconn;
    private $id;
    private $type;
    public $login;
    public $permissions;

    public function __construct($id, $login) {
        $this->login = $login;
        $this->setType();
        $this->setId($id);
        $this->setPermissions();
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
    private function setPermissions()
    {
        $this->permissions = array();
        $permissionsSites = self::$dbconn->query("SHOW COLUMNS FROM `permissions` WHERE FIELD NOT LIKE 'id' AND FIELD NOT LIKE 'userId'");
        $result = self::$dbconn->query("SELECT * FROM permissions WHERE userId = '{$this->id}'")->fetch_assoc();
        foreach($permissionsSites as $ps){
            $this->permissions += [$ps['Field'] => $result[$ps['Field']]];
        }
    }

    public function getType(){
        return $this->type;
    }
    public function getId(){
        return $this->id;
    }
}