<?php

abstract class Controller{
    protected $db;

    public function __construct()
    {
        try{
            $this->db = BaseDeDatos::obtenerConexion();
        } catch( ConexionBbddException $e ){
            // TODO: mostrar mensaje de error en lugar de die
            die( $e->getMessage() );
        }
    }

    public abstract function defaultAction();

}