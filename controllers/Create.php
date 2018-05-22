<?php

class Create extends Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->view->render('create/index');
    }
    
    
}