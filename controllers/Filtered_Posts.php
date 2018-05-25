<?php

class Filtered_Posts extends Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
    $this->view->render('filtered_posts/index');}
    
 //function below added for ajax search - work in progress
    function search(){
        $this->loadModel("post");
        //1. read search term from query string using GET superglobal
        $search_term = $_GET ['search_term'];
         //2. send search term to method on post.model
         //3. model returns results
        $searchresults = $this->model->searcharticles($search_term); 
        //$searchresults = $this->model->search($search_term);T
        //4. render a view        
        $this->view->render('post/searchresults', $searchresults, true);

    }
        
}