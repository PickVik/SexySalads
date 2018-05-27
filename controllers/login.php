<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
      
    }

    //rendering view but not in use
    function index(){
      
        
        $this->view->render('login/index');
        
    }
    
    // calls login from login_model
    
    function login(){
        
        $this->model->login();
       
        
    }
    
}

?>