<?php

class Post extends Controller {

    // if in session then have access to these functions
    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            Session::destroy();
            header('location: ../index'); 
        }
    }

    //rendering view but not in use
    
    function index() {


        $this->view->render('post/index');
    }
    
    // need to be worked on and the button that belongs to it should be on every page if the person is logged in
    function logout() {

        Session::destroy();
        header('location: ../index');
        exit;
    }
    
    
    
    // calls show all function from post model and renders a view for it on views/post/admin page 
    // - this is the manage articles page as we see it(perhaps we should rename that page to manage articles instead of admin)
    function admin() {


        // we store all the posts in this variable
        $articles = $this->model->show_all();

        $this->view->render('post/admin', $articles);
    }
    
    // constans for upload and pic format
    const InputKey = 'myfile';
    const AllowedTypes = ['image/jpeg'];

    public function upload_pic() {

    // error handling for upload

        if (empty($_FILES[Post::InputKey])) {
            die("File Missing!");
        }

        if ($_FILES[Post::InputKey]['error'] > 0) {
            die("handle the error!");
        }

        if (!in_array($_FILES[Post::InputKey]['type'], Post::AllowedTypes)) {
            die("Handle File Type Not Allowed");
        }

        $tmpFile = $_FILES[Post::InputKey]['tmp_name'];

        $dstFile = 'views/pictures/' . $_FILES[Post::InputKey]['name'];

        if (!move_uploaded_file($tmpFile, $dstFile)) {
            die("Handle Error");
        }

        if (file_exists($dstFile)) {

            

            echo "Success";
            
        }
    }

    
    
    //calls in find article from post_model and renders view views/post/edit page by article id 
    function open_edit() {
        
        $article = $this->model->find_article($_GET['article_id']);


        $this->view->render('post/edit', $article);
    }
    
    
    // checks if the article id is there if not goes to errors page
    // else calls update function from post_model
    
    // NEED TO BE UPDATED - MISSING: PUBLISHED, IMAGE UPLOAD, USER, TOPIC

    function update() {



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_POST['article_id'])) {
                header('location: /errors');
            }
            
        if (!empty($_FILES[Post::InputKey]['name'])) {
            
            
          
            $this->upload_pic();
            $article = $this->model->update($_POST['article_id'],$_POST['title'], $_POST['body'], $_POST['slug'], $_FILES[Post::InputKey]['name'], $_POST['published']);

            header('location: ../admin');
	}else {
            $article = $this->model->update_without_image($_POST['article_id'],$_POST['title'], $_POST['body'], $_POST['slug'], $_POST['published']);
            header('location: ../admin');
        }
            // we use the given id to get the correct product
             
        }
    }
    
    // Calls in the topics and
    // renders a view/post/newarticle page including topics

    function create_newarticle() {

        $topics = $this->model->topic->get_all_topic();

        $this->view->render('post/newarticle', $topics);
    }
    
    
    
    //calls in upload_pic from post
    // calls in add_article from post_model and couples it up with the data POSTed in the VIEW
    // when executed head to admin page
    
    function add_article() {

        $this->upload_pic();
        $this->model->add_article($_POST['title'], $_POST['body'], $_POST['slug'], $_FILES[Post::InputKey]['name'], $_POST['user_id'], $_POST['topic'],  $_POST['published']);



        header('location: ../admin');
    }
    
    
    // deletes article from database based on article_id
    // when executed head to admin page
    
    function delete() {

        $this->model->delete($_GET['article_id']);
        header('location: admin');

        //$this->view->render('post/delete');
    }

}
