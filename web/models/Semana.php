<?php

class Semana{

    public $dias = [];
    public $numSemana;

    public function __construct( $dias, $numSemana )
    {
        $this->dias = $dias;
        $this->numSemana = $numSemana;
    }

    public static function obtenerSemana( mysqli $db, $numSemana ){
        $sql = 'SELECT * FROM dia WHERE semana = ? ORDER BY fecha ASC';
        $prepStmt = $db->prepare( $sql );
        $prepStmt->bind_param( 'i', $numSemana );
        $prepStmt->execute();
        $res = $prepStmt->get_result();
        $semana = null;
        if( $res ){
            $dias = [];
            $numSemana = -1;
            foreach( $res->fetch_all(MYSQLI_ASSOC) as $fila ){
                $comidaMediodia = Comida::obtenerComida( $db, $fila['mediodia_cod'] );
                $comidaCena = Comida::obtenerComida( $db, $fila['cena_cod'] );
                $dia = new Dia(
                    $fila['fecha'],
                    $fila['semana'],
                    $fila['finde'],
                    ( $fila['festivo_cod'] ? true : false),
                    $comidaMediodia,
                    $comidaCena,
                    $fila['codigo']);
                $dias[] = $dia;
            }
            if( count($dias) > 0 ){
                $numSemana = $dias[0]->semana;
                $semana = new Semana( $dias, $numSemana );
            }
        }
        return $semana;
    }

}