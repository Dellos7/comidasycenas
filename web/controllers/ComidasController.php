<?php

class ComidasController extends Controller {

    public function defaultAction(){
        $this->mostrar();
    }

    public function mostrar(){
        if( Utils::validarUsuarioYRedirigir() ){
            $comidas = Comida::obtenerComidas( $this->db );
            include_once "views/comidas/mostrar.php";
        }
    }

}