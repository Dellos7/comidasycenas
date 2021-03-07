<?php

error_reporting( E_ERROR );

require_once "autoload.php";
require_once "config/globals.php";
require_once "config/bbdd.php";

session_start();
ob_start();

$api = false;
$request = $_GET['request'];
$defCtrl = DEFAULT_CONTROLLER;
$controller = new $defCtrl;
$action = DEFAULT_ACTION;
if( $request ){
    $requestArr = explode( "/", $request );
    if( $requestArr && $requestArr[0] ){
        if( $requestArr[0] === 'api' ){
            $api = true;
            array_shift( $requestArr );
        }
        $controllerClassName = ucfirst( $requestArr[0] ) . 'Controller';
        if( class_exists( $controllerClassName ) ){
            $controller = new $controllerClassName;
        }
        if( $requestArr[1] && method_exists( $controller, $requestArr[1] ) ){
            $action = $requestArr[1];
        }
    }
}

if( !$api ){
    include_once "views/layouts/header.php";
    include_once "views/alert/success.php";
    include_once "views/alert/error.php";
}

$controller->$action();

if( !$api ){
    include_once "views/layouts/footer.php";
}

ob_flush();