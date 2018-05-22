<?php

class Edit extends Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->view->render('edit/index');
    }
    
    
}
