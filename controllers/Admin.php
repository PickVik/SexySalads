<?php

class Admin extends Controller {
    public function __construct() {
        parent::__construct();
        session_start();
        if(!isset($_SESSION['Email'])){

//echo "Sorry, Please login and use this page";
header("location:index");
exit;}
    }
    
    public function index() {
        $this->view->render('admin/index');
    }
    
    
    public function open_user(){
        
        
            $this->view->render('admin/manage_user');
    }
        
    public function register_new_admin(){
        
         if(isset($_POST['submit'])){
            
    
            if ($_POST['password'] !== $_POST['cpassword']){
            echo "Password does not match";
        
        
    }   else {
       
        $this->model->register_new_admin($_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['password'], $_POST['admin']);
                
        
        header('location: ../admin');
    }
         }

         
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

