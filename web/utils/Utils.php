<?php

class Utils{

    public static function redirect( $url ){
        header( "Location: " . BASE_URL . $url );
    }

    public static function validarUsuario(){
        $usuario = SessionUtils::get('usuario');
        if( $usuario ){
            return true;
        }
        return false;
    }

    public static function validarUsuarioYRedirigir(){
        if( self::validarUsuario() ){
            return true;
        }
        self::redirect( 'usuario/login' );
    }

}