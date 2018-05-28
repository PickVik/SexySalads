<?php

class Login_model extends Model {

    function __construct() {
        parent::__construct();
    }

    // checks login data in database
    // if correct then heads to admin page
    // else main page
    // PASSWORD NEEDS TO BE HASHED!!!
<<<<<<< HEAD


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
            echo "invalid";
        }

        /*
          $stm = $this->db->prepare("SELECT user_id FROM user WHERE email = :email AND password = MD5(:password)"); //MD5(:password) - once PW is hashed
          $stm->execute(array(

          ':email' =>$_POST['email'],
          ':password'=>$_POST['password']

          ));


          $data = $stm->fetchAll();
          $row = $stm->rowCount();

          if ($row >0){

          //login
          Session::init();


          $_SESSION['Email'] = $_POST['email'];

          header('location: ../admin');

          // NEEDS TO BE CHECKED - SHOULD TAKE YOU TO MAIN PAGE WHERE WE HAVE THE NAVBAR
          }else {
          //error
          header ('location: ../index');

          }
          print_r($data); */
    }

}
=======
    
    
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
 
>>>>>>> d8f2632229ede3448662578510352b4449acd513
