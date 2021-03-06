<?php

error_reporting( E_ERROR );

require_once "autoload.php";
require_once "config/globals.php";
require_once "config/bbdd.php";

session_start();
ob_start();

include_once "views/layouts/header.php";
include_once "views/alert/success.php";
include_once "views/alert/error.php";

// try{
//     $bbdd = BaseDeDatos::obtenerConexion();
// } catch( ConexionBbddException $e ){
//     die( $e->getMessage() );
// }

$request = $_GET['request'];
$defCtrl = DEFAULT_CONTROLLER;
$controller = new $defCtrl;
$action = DEFAULT_ACTION;
if( $request ){
    $requestArr = explode( "/", $request );
    if( $requestArr && $requestArr[0] ){
        $controllerClassName = ucfirst( $requestArr[0] ) . 'Controller';
        if( class_exists( $controllerClassName ) ){
            $controller = new $controllerClassName;
        }
        if( $requestArr[1] && method_exists( $controller, $requestArr[1] ) ){
            $action = $requestArr[1];
        }
    }
}
$controller->$action();

include_once "views/layouts/footer.php";

ob_flush();