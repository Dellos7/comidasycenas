<?php

class DefaultController extends Controller {

    public function defaultAction(){
        Utils::redirect( 'usuario/login' );
    }

}