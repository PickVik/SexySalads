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
   
  /* function email_exist (){
       
       $stmt = $this->db->prepare("SELECT * FROM user WHERE email = :email");
       $stmt->execute(array(':email' => $_POST['email']));
       $row = $stmt->fetch(PDO::FETCH_ASSOC);
       if(!empty($row['email'])){
       $msg = 'Email provided is already in use.';
    }
        
                
        
   }*/
   
   
   function email_exist(){
       
       
       $stmt = $this->db->prepare("SELECT email FROM user WHERE email = :email");
       
       $stmt->execute(array(

         ':email' =>$_POST['email'],
        

         ));    
       
       $user = $stmt->fetch();

       if ($user['email'] == $_POST['email']){
           
           header('location: ../admin/open_user');
           echo 'email exists';
           exit();
  
       }
       
   }
    

}




?>
