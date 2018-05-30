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
             
             $this->model->email_exist();
     
    /*$stmt = $this->db->prepare('SELECT email FROM user WHERE email = :email');
    $stmt->execute(array(':email' => $_POST['email']));
    $row = $stmt->fetch();
   
    if(!empty($row['email'])){
        
        echo "Email provided is already in use.";
        header('location: ../admin/open_user');
        exit();
        */
    }  
       
         if ($_POST['password'] !== $_POST['cpassword']){
             
             echo "Sorry, your password does not match." . PHP_EOL . PHP_EOL;
             echo '<button style="background-color: #8f50e7"><a href=../admin>Return to Admin page</a></button>';
             //header('location: ../admin/open_user');
             
        exit();
    }  
    
 
  
      else{
       
        $this->model->register_new_admin($_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['password'], $_POST['admin']);
                
        
        header('location: ../admin');
        exit();
    }
         } 
         
         
    
         
         function manage_images(){
        $this->view->render('admin/manage_images');
    }
}