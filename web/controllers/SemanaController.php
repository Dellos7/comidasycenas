<?php

class SemanaController extends Controller {

    public function defaultAction(){
        $this->mostrar();
    }

    public function mostrar(){
        if( Utils::validarUsuarioYRedirigir() ){
            if( isset($_GET['semana']) ){
                $numSemana = intval( $_GET['semana'] );
            } else{
                $numSemana = FechaUtils::obtenerSemanaActual();
            }
            $semanaActualAnteriorSiguiente = $this->semanaAnteriorActualSiguiente( $numSemana );
            $semana = Semana::obtenerSemana( $this->db, $numSemana );
            include_once "views/semana/semana.php";
            // echo "Semana del año: {$semanaActual} <br>";
            // echo "<pre>" . print_r($semana, true) . "</pre>";
        }
    }

    public function generar(){
        if( Utils::validarUsuarioYRedirigir() ){
            $numSemanaAGenerar = $_POST['semana'];
            echo "Num semana a generar: " . $numSemanaAGenerar . "<br>";
            $this->obtenerFechaDesdeNumSemana( $numSemanaAGenerar );
        }
    }

    private function semanaAnteriorActualSiguiente( $numSemana ){
        $semanaActual = FechaUtils::obtenerSemanaActual();
        if( $numSemana == $semanaActual ){
            return 'actual';
        } else if( $numSemana == $semanaActual+1 ){
            return 'que viene';
        } else if( $numSemana == $semanaActual-1 ){
            return 'pasada';
        } else{
            return 'del dia X'; //TODO: cambiar
        }
    }

    private function obtenerFechaDesdeNumSemana( $numSemana ){
        //TODO: hay que tener en cuenta el año, a ver como lo hago
    }

}