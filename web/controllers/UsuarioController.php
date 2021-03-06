<?php

class UsuarioController extends Controller {

    public function defaultAction(){
        $this->login();
    }

    public function login(){
        if( $_SERVER['REQUEST_METHOD'] === 'GET' ){
            include_once "views/login/login.php";
        } else{
            // Es POST
            $this->doLogin();
        }
    }

    public function logout(){
        SessionUtils::remove( 'usuario' );
        Utils::redirect( 'usuario/login' );
    }

    private function doLogin(){
        $nomUsuario = $_POST['usuario'];
        $contrasenya = $_POST['contrasenya'];
        if( $nomUsuario && $contrasenya ){
            $usuario = Usuario::obtenerUsuario( $this->db, $nomUsuario, $contrasenya );
           if( $usuario ){
                SessionUtils::set( 'success', 'Login correcto' );
                SessionUtils::set( 'usuario', $usuario );
                Utils::redirect( 'semana' );
           } else{
                SessionUtils::set( 'error', 'Login incorrecto' );
                Utils::redirect( 'usuario/login' );
           }
        } else{
            SessionUtils::set( 'error', 'Login incorrecto' );
            Utils::redirect( 'usuario/login' );
        }
    }
}