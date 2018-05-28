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
       
      
        $stmt = $this->db->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->execute([$_POST['email']]);
        $user = $stmt->fetch();
       // $user = $user[4];
        if ($user && password_verify($_POST['password'], $user[4]))
{

      // if ($row >0 && password_verify($_POST['password'], $data_array['password'])){
           
           //login
           Session::init();
          
           $_SESSION['Email'] = $_POST['email'];
           
           header('location: ../admin');
          
         // NEEDS TO BE CHECKED - SHOULD TAKE YOU TO MAIN PAGE WHERE WE HAVE THE NAVBAR  
       }else {
           //error
           header ('location: ../index');
           
       }
       print_r($data);
   }
}
 
