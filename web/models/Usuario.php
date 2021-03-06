<?php

class Usuario{

    public $codigo;
    public $usuario;
    public $contrasenya;
    public $nombre;
    public $apellidos;

    public function __construct( $usuario, $contrasenya, $nombre, $apellidos, $codigo = null )
    {
        $this->codigo = $codigo;
        $this->usuario = $usuario;
        $this->contrasenya = $contrasenya;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;   
    }

    public static function obtenerUsuario( mysqli $db, $usuario, $contrasenya = null ){
        $sql = 'SELECT * FROM usuario WHERE usuario = ?';
        $prepSt = $db->prepare( $sql );
        $prepSt->bind_param( 's', $usuario );
        $prepSt->execute();
        $res = $prepSt->get_result();
        $usuario = null;
        if( $res ){
            $fila = $res->fetch_assoc();
            if( ( $contrasenya && password_verify( $contrasenya, $fila['contrasenya'] ) ) ||
                !$contrasenya ){
                    $usuario = new Usuario(
                        $fila['usuario'],
                        $fila['contrasenya'],
                        $fila['nombre'],
                        $fila['apellidos'],
                        $fila['codigo'] );
            }
        }
        return $usuario;
    }

}