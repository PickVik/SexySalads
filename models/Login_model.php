<?php

class Login_model extends Model {

    function __construct() {
        parent::__construct();
        
    }
    
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
           header('location: ../post/admin');
          
           
       }else {
           //error
           header ('location: ../login');
           
       }
       print_r($data);
   }
          

}