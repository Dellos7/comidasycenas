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
                    Utils::redirect( "comidas" );
                }
            } else{
                Utils::redirect( "comidas" );
            }
        }
    }

    public function borrar(){
        if( Utils::validarUsuarioYRedirigir() ){            
            $codigo = $_GET['codigo'];
            if( $codigo ){
                $ok = Comida::borrarComida( $this->db, $codigo );
                $res = [ 'error' => !$ok ];
            } else{
                $res = [ 'error' => true ];
            }
            header( "Content-Type: application/json" );
            echo json_encode( $res );
        }
    }

    public function guardar(){
        if( Utils::validarUsuarioYRedirigir() ){
            $codigo = $_POST['codigo'];
            $descripcion = $_POST['descripcion'];
            $esEntreSemana = isset($_POST['entresemana']);
            $esCena = isset($_POST['cena']);
            $res = Comida::guardarComida( $this->db, $descripcion, $esEntreSemana, $esCena, $codigo );
            if( $res ){
                SessionUtils::set( 'success', $codigo ? 'Comida guardada correctamente' : 'Comida añadida correctamente' );
                Utils::redirect( 'comidas' );
            } else{
                SessionUtils::set( 'error', 'Error guardando la comida' );
                if( $codigo ){
                    Utils::redirect( 'comida/editar?codigo=' . $codigo );
                } else{
                    Utils::redirect( 'comida/anyadir' );
                }
            }
        }
    }

}