<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
      
    }

    
    function index(){
      
        
        $this->view->render('admin/index');
    }
    
    
    function login(){
        
        $this->model->login();
        
    }
    
}

?>