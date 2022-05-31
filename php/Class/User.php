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
        $result = self::$dbconn->query("SELECT * FROM permissions WHERE userId = '{$this->id}'")->fetch_assoc();
        $this->permissions = array('addSongSite'=>(boolean)$result['addSongSite'], 'controlPanelSite'=>(boolean)$result['controlPanelSite'], 'playlistSite'=>(boolean)$result['playlistSite'], 'bannedMusicSite'=>(boolean)$result['bannedMusicSite'], 'historySite'=>(boolean)$result['historySite'], 'musicListSite'=>(boolean)$result['musicListSite'], 'indexSite'=>(boolean)$result['indexSite'], 'requestSite'=>(boolean)$result['requestSite']);
    }

    public function getType(){
        return $this->type;
    }
    public function getId(){
        return $this->id;
    }
}