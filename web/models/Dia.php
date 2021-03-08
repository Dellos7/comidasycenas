<?php

class Dia{

    public $codigo;
    public $fecha;
    public $fechaDt;
    public $semana;
    public $esFinde;
    public $esFestivo;
    public $comidaMediodia;
    public $comidaCena;

    public function __construct( $fecha, $semana, $esFinde, $esFestivo, $comidaMedioDia, $comidaCena, $codigo = null )
    {
        $this->fecha = $fecha;
        $this->fechaDt = new DateTime( $this->fecha );
        $this->semana = $semana;
        $this->esFinde = $esFinde;
        $this->esFestivo = $esFestivo;
        $this->comidaMediodia = $comidaMedioDia;
        $this->comidaCena = $comidaCena;
        $this->codigo = $codigo;
    }

}