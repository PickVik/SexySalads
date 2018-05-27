<?php

class Login_model extends Model {

    function __construct() {
        parent::__construct();
        
    }
    
    
    // checks login data in database
    // if correct then heads to admin page
    // else main page
    
    // PASSWORD NEEDS TO BE HASHED!!!
    
    
   public function login(){
       
      
       $stm = $this->db->prepare("SELECT user_id FROM user WHERE email = :email AND password = :password"); //MD5(:password) - once PW is hashed
       $stm->execute(array(
           
          ':email' =>$_POST['email'],
           ':password'=>$_POST['password']
       
       ));
       
       
       $data = $stm->fetchAll();
       $row = $stm->rowCount();
       
       if ($row >0){
           
           //login
           Session::init();
           Session::set('loggedIn', true);
           header('location: ../admin');
          
         // NEEDS TO BE CHECKED - SHOULD TAKE YOU TO MAIN PAGE WHERE WE HAVE THE NAVBAR  
       }else {
           //error
           header ('location: ../index');
           
       }
       print_r($data);
   }
          

}