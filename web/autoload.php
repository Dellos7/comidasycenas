<?php

function cargarControladores( $className ){
    include_once "controllers/" . $className . ".php";
}

function cargarExcepciones( $className ){
    include_once "exceptions/" . $className . ".php";
}

function cargarModelos( $className ){
    include_once "models/" . $className . ".php";
}

function cargarUtils( $className ){
    include_once "utils/" . $className . ".php";
}

spl_autoload_register( 'cargarControladores' );
spl_autoload_register( 'cargarExcepciones' );
spl_autoload_register( 'cargarModelos' );
spl_autoload_register( 'cargarUtils' );