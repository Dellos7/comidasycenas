<?php

class ConexionBbddException extends Exception{

    public function __construct( $msg = 'Error en la conexión con la base de datos' ) {
        parent::__construct( $msg );
    }

}