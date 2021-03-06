<?php

class ComidaController extends Controller {

    public function defaultAction(){
        $this->anyadir();
    }

    public function anyadir(){
        if( Utils::validarUsuarioYRedirigir() ){
            $editando = false;
            include_once "views/comida/editar.php";
        }
    }

    public function editar(){
        if( Utils::validarUsuarioYRedirigir() ){
            $editando = true;
            $codigo = $_GET['codigo'];
            if( $codigo ){
                $comida = Comida::obtenerComida( $this->db, $codigo );
                if( $comida ){
                    include_once "views/comida/editar.php";
                } else{
                    Utils::redirect( BASE_URL . "comidas" );
                }
            } else{
                Utils::redirect( BASE_URL . "comidas" );
            }
        }
    }

    public function guardar(){
        if( Utils::validarUsuarioYRedirigir() ){
            $codigo = $_POST['codigo'];
            $descripcion = $_POST['descripcion'];
            $esEntreSemana = isset($_POST['entresemana']);
            $res = Comida::guardarComida( $this->db, $descripcion, $esEntreSemana, $codigo );
            if( $res ){
                SessionUtils::set( 'success', $codigo ? 'Comida guardada correctamente' : 'Comida añadida correctamente' );
                Utils::redirect( BASE_URL . 'comidas' );
            } else{
                SessionUtils::set( 'error', 'Error guardando la comida' );
                if( $codigo ){
                    Utils::redirect( BASE_URL . 'comida/editar?codigo=' . $codigo );
                } else{
                    Utils::redirect( BASE_URL . 'comida/anyadir' );
                }
            }
        }
    }

}