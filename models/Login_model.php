<?php

class Login_model extends Model {

    function __construct() {
        parent::__construct();
    }

    // checks login data in database
    // if correct then heads to admin page
    // else main page
    



    public function login() {


        $stmt = $this->db->prepare("SELECT * FROM user WHERE email = :email");
        
        $stmt->execute(array(

          ':email' =>$_POST['email'],
         

          ));    
        
        $user = $stmt->fetch();

        if ($user && password_verify($_POST['password'], $user['password'])) {
            
            
            //login
          Session::init();


          $_SESSION['Email'] = $_POST['email'];

          header('location: ../admin');
            
            
        } else {
            echo "Uh oh! You entered the wrong password. Please try again.";
        }

        

    }
}
    