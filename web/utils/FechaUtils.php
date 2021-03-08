<?php

class FechaUtils{

    public static $DIAS_SEMANA_TEXTUALES = [
        0 => 'Domingo',
        1 => 'Lunes',
        2 => 'Martes',
        3 => 'Miércoles',
        4 => 'Jueves',
        5 => 'Viernes',
        6 => 'Sábado'
    ];

    public static function obtenerSemanaActual(){
        $dt = new DateTime();
        // $diaSemana = $dt->format('N');
        $semanaActual = intval( $dt->format('W') );
        return $semanaActual;
    }

    public static function obtenerDiaSemanaTextual( DateTime $dt ){
        $diaSemanaNum = $dt->format('w');
        return self::$DIAS_SEMANA_TEXTUALES[$diaSemanaNum];
    }

    public static function obtenerFechaFormateada_es( DateTime $dt ){
        return $dt->format( 'd/m/Y' );
    }

    public static function obtenerFechaFormateada_bbdd( DateTime $dt ){
        return $dt->format( 'Y-m-d' );
    }

}