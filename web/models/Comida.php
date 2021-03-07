<?php

class Comida{

    public $codigo;
    public $descripcion;
    public $esEntresemana;
    public $esCena;

    public function __construct( $codigo, $descripcion, $esEntreSemana, $esCena )
    {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->esEntresemana = $esEntreSemana;
        $this->esCena = $esCena;
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
            $comida = new Comida( $fila['codigo'], $fila['descripcion'], $fila['entresemana'], $fila['cena'] );
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
                $comida = new Comida( $fila['codigo'], $fila['descripcion'], !!$fila['entresemana'], !!$fila['cena'] );
                $comidas[] = $comida;
            }
        }
        return $comidas;
    }

    public static function guardarComida( mysqli $db, $descripcion, $esEntreSemana, $esCena, $codigo = null ){
        $prepStmt = null;
        $esEntreSemana = !!$esEntreSemana ? 1 : 0;
        $esCena = !!$esCena ? 1 : 0;
        if( !$codigo ){
            $sql = 'INSERT INTO comida (descripcion, entresemana, cena) VALUES (?, ?, ?)';
            $prepStmt = $db->prepare( $sql );
            $prepStmt->bind_param( 'sii', $descripcion, $esEntreSemana, $esCena );
        } else{
            $sql = 'UPDATE comida SET descripcion = ?, entresemana = ?, cena = ? WHERE codigo = ?';
            $prepStmt = $db->prepare( $sql );
            $prepStmt->bind_param( 'siii', $descripcion, $esEntreSemana, $esCena, $codigo );
        }
        $ret = $prepStmt->execute();
        return $ret;
    }

    public static function borrarComida( mysqli $db, $codigo ){
        $ok = false;
        if( $codigo ){
            $sql = 'DELETE FROM comida WHERE codigo = ?';
            $prepStmt = $db->prepare( $sql );
            $prepStmt->bind_param( 'i', $codigo );
            $ok = $prepStmt->execute();
        }
        return $ok;
    }

}