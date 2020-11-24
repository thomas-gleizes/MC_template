<?php

File::requireOnce(REP_CONFIG, 'conf.php');

class PDOManager extends PDO {

    public function __construct() {

        try {
            $hostname = Conf::getHostname();
            $login = Conf::getLogin();
            $database = Conf::getDatabase();
            $password = Conf::getPassword();

            parent::__construct("mysql:host=$hostname;dbname=$database", $login, $password, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
            parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            if (Conf::getDebug()) echo $e->getMessage();
            die();
        }

    }

    public function sendRequest ($sql, $params = [], $PDO_MODE = PDO::FETCH_OBJ, $fetch = "fetchAll"){
        try {
            $req_prep = parent::prepare($sql);
            $req_prep->execute($params);
            $req_prep->setFetchMode($PDO_MODE);
            return $req_prep->$fetch();
        } catch (PDOException $e) {
            return ["codeError" => $e->getCode(), "message" => $e->getMessage()];
        }
    }

    public function insertRequest ($sql, $params = []){
        try {
            $req_prep = parent::prepare($sql);
            $req_prep->execute($params);
        } catch (PDOException $e){
            return ["codeError" => $e->getCode(), "message" => $e->getMessage()];
        }
    }

}