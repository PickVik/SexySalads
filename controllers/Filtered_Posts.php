<?php

class Filtered_Posts extends Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
    $this->view->render('filtered_posts/index');}
    

        
}