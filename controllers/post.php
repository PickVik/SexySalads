<?php

class Post extends Controller {

        function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false){
        Session::destroy();
        header('location: ../login');

        }

        }


        function index(){


        $this->view->render('post/index');
        }

        function logout(){

        Session::destroy();
        header('location: ../login');
        exit;

        }


        function admin(){


        // we store all the posts in a variable
        $articles = $this->model->show_all();

        $this->view->render('post/admin', $articles);
        }

        function open_edit(){

        $article = $this->model->find_article($_GET['article_id']);


        $this->view->render('post/edit', $article);


        }


        function update(){



        if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if (!isset($_GET['article_id'])) {
        header('location: /errors');
        }
        // we use the given id to get the correct product
        $article = $this->model->update($_GET['article_id'], $_GET['title'], $_GET['body']);

        header('location: ../admin/index');

        }
        }

        function create_newarticle(){

        $topics = $this->model->topic->get_all_topic();

        $this->view->render('post/newarticle', $topics);


        }

        function add_article(){
       
       
        $this->model->add_article($_GET['title'], $_GET['body'], $_GET['slug'], 
                   $_GET['image'], $_GET['user_id'], $_GET['topic']);
        

        header('location: ../admin/index');
        
      
        }



        



        function delete(){



        $this->view->render('post/delete');
        }

        
        

}