<?php




class Admin_model extends Model {

   function __construct($user_id = 0, $email = 0, $first_name = 0, $last_name = 0, $password = 0, $admin = 0) {
        parent::__construct();
        $this->user_id = $user_id;
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->password = $password;
        $this->admin = $admin;
        
    }
    
    
    
    
      function register_new_admin($email, $first_name, $last_name, $password, $admin){
       
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $req = $this->db->prepare("INSERT INTO user (email, first_name, last_name, password, admin)
          VALUES (:email, :first_name, :last_name, :hash, :admin)");
      
        //$req->bindParam(':user_id', $user_id);
        $req->bindParam(':email', $email);
        $req->bindParam(':first_name', $first_name);
        $req->bindParam(':last_name', $last_name);
        $req->bindParam(':hash', $hash);
        $req->bindParam(':admin', $admin);
        
        $req->execute();
        
        echo $first_name . " is now an admin";
   }

}




?>
