<?php

File::requireOnce(REP_CONFIG, 'conf.php');

class Model {

    public static $pdo;

    public static function Init() {
        try {
            $hostname = Conf::getHostname();
            $login = Conf::getLogin();
            $database = Conf::getDatabase();
            $password = Conf::getPassword();
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database", $login, $password, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            if (Conf::getDebug()) echo $e->getMessage();
            die();
        }
    }

    public static function sendRequest($sql = "", $values = [], $PDO_MODE = PDO::FETCH_ASSOC, $fetch = 'fetchAll') {
        try {
            $req_prep = self::$pdo->prepare($sql);
            $req_prep->execute($values);
            $req_prep->setFetchMode($PDO_MODE);
            return $req_prep->$fetch();
        } catch (PDOException $e) {
            return $e->getCode();
        }
    }

}

Model::Init();