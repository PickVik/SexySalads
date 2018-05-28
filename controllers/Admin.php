<?php

class Admin extends Controller {
    public function __construct() {
        parent::__construct();
        session_start();
        if(!isset($_SESSION['Email'])){

echo "Sorry, Please login and use this page";
header("location:index");
exit;}
    }
    
    public function index() {
        $this->view->render('admin/index');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   // public function topics() {
//        $topics = $this->model->getAllTopics();
//        $this->view->render('admin/topics', $topics);
     //   $this->view->render('admin/index');
    }
    
//    public function comments() {
//        $comments = $this->model->getCommentsNeedingApproval();
//        $this->view->render('admin/commentsApprovalDashboard', $comments);
//    }
    
 


// /admin/topics
// /admin/comments

