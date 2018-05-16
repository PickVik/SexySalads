<?php

class Errors extends Controller {

    function __construct() {
        parent::__construct();
        //echo 'This is an error!';
        $this->view->msg = 'This page doesn\'t exist';
    }

    function index() {
                $this->view->render('errors/index');

    }
}

