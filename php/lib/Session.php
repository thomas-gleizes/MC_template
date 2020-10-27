<?php

class Session {

    private static $name = "";

    public static function startSession(){
        if (session_status() == PHP_SESSION_NONE){
            session_name(self::$name);
            session_start();
        }
    }

    public static function testAdmin(){
        self::startSession();
        return isset($_SESSION['admin']);
    }

}