<?php

class Security{

    private static $seed = '';

    public static function hash($password){
        return hash('sha256',$password . self::$seed);
    }

    public static function containsEmoji($str) {
        preg_match( '/[\x{1F600}-\x{1F64F}]/u', $str, $matches_emo );
        return !empty( $matches_emo[0] ) ? true : false;
    }

}