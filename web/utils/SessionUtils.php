<?php

class SessionUtils{

    public static function set( $key, $value ){
        $_SESSION[$key] = $value;
    }

    public static function remove( $key ){
        if( isset($_SESSION[$key]) ){
            unset( $_SESSION[$key] );
            $_SESSION[$key] = null;
        }
    }

    public static function get( $key ){
        return $_SESSION[$key];
    }

}