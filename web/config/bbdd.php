<?php

class BaseDeDatos{

    public static function obtenerConexion() {
        $conn = new mysqli(
            $_ENV['MYSQL_HOST'],
            $_ENV['MYSQL_USER'],
            $_ENV['MYSQL_PASSWORD'],
            DBNAME,
            $_ENV['MYSQL_PORT']
        );
        if( $conn->connect_errno ){
            throw new ConexionBbddException( $conn->connect_error );
        } else{
            return $conn;
        }
    }

}