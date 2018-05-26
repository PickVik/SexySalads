<?php

class Post extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if ($logged == false) {
            Session::destroy();
            header('location: ../login'); // need to check this 
        }
    }

    function index() {


        $this->view->render('post/index');
    }

    function logout() {

        Session::destroy();
        header('location: ../login');
        exit;
    }

    function admin() {


        // we store all the posts in a variable
        $articles = $this->model->show_all();

        $this->view->render('post/admin', $articles);
    }

    function open_edit() {
        
        $article = $this->model->find_article($_GET['article_id']);


        $this->view->render('post/edit', $article);
    }

    function update() {



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!isset($_POST['article_id'])) {
                header('location: /errors');
            }
            // we use the given id to get the correct product
             $this->upload_pic();
            $article = $this->model->update($_POST['title'], $_POST['body'], $_POST['slug'], $_FILES[Post::InputKey]['name'], $_POST['published']);

            header('location: ../admin');
        }
    }

    function create_newarticle() {

        $topics = $this->model->topic->get_all_topic();

        $this->view->render('post/newarticle', $topics);
    }

    const InputKey = 'myfile';
    const AllowedTypes = ['image/jpeg'];

    public function upload_pic() {



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

            // $req->$this->db->

            echo "Success";
            //echo "<a href='Website.html'>Logout</a><br>";
        }
    }

    function add_article() {

        $this->upload_pic();
        $this->model->add_article($_POST['title'], $_POST['body'], $_POST['slug'], $_FILES[Post::InputKey]['name'], $_POST['user_id'], $_POST['topic'],  $_POST['published']);



        header('location: ../admin');
    }

    function delete() {

        $this->model->delete($_GET['article_id']);
        header('location: admin');

        //$this->view->render('post/delete');
    }

}
