<?php

class Comida{

    public $codigo;
    public $descripcion;
    public $esEntresemana;

    public function __construct( $codigo, $descripcion, $esEntreSemana )
    {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->esEntresemana = $esEntreSemana;
    }

    public static function obtenerComida( mysqli $db, $codigo ){
        $sql = 'SELECT * FROM comida WHERE codigo = ?';
        $prepStmt = $db->prepare($sql);
        $prepStmt->bind_param('i', $codigo);
        $prepStmt->execute();
        $res = $prepStmt->get_result();
        $comida = null;
        if( $res && $res->num_rows > 0 ){
            $fila = $res->fetch_assoc();
            $comida = new Comida( $fila['codigo'], $fila['descripcion'], $fila['entresemana'] );
        }
        return $comida;
    }

    public static function obtenerComidas( mysqli $db ){
        $sql = 'SELECT * FROM comida ORDER BY descripcion ASC';
        $prepStmt = $db->prepare( $sql );
        $prepStmt->execute();
        $res = $prepStmt->get_result();
        $comidas = [];
        if( $res ){
            foreach( $res->fetch_all(MYSQLI_ASSOC) as $fila ){
                $comida = new Comida( $fila['codigo'], $fila['descripcion'], !!$fila['entresemana'] );
                $comidas[] = $comida;
            }
        }
        return $comidas;
    }

    public static function guardarComida( mysqli $db, $descripcion, $esEntreSemana, $codigo = null ){
        $prepStmt = null;
        $esEntreSemana = !!$esEntreSemana ? 1 : 0;
        if( !$codigo ){
            echo 'insert <br>';
            $sql = 'INSERT INTO comida (descripcion, entresemana) VALUES (?, ?)';
            $prepStmt = $db->prepare( $sql );
            $prepStmt->bind_param( 'si', $descripcion, $esEntreSemana );
        } else{
            echo "update, codigo: {$codigo}, descripcion: {$descripcion}, entre semana: {$esEntreSemana} <br>";
            $sql = 'UPDATE comida SET descripcion = ?, entresemana = ? WHERE codigo = ?';
            $prepStmt = $db->prepare( $sql );
            $prepStmt->bind_param( 'sii', $descripcion, $esEntreSemana, $codigo );
        }
        $ret = $prepStmt->execute();
        return $ret;
    }

}