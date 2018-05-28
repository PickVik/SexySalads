
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        
        <div class="container" style ="color:#8f50e7">
   
          
       
        <h2>Register new admin</h2>
        
        <form action='../admin/register_new_admin' method="post" > 
        
        Email Address:         <input class="form-control" type="email"  name="email" required placeholder ="Email" /> <br>
        Password:              <input class="form-control" type="password" name="password" required placeholder ="Password"/> <br>
        Confirm Password:      <input class="form-control" type="password"  name="cpassword" required placeholder ="Confirm Password"/> <br>
        First Name:            <input class="form-control" type="text" name="first_name" required placeholder ="First Name" /> <br>
        Last Name:           <input class="form-control" type="text" name="last_name" required placeholder ="Second Name"/> <br>
        Admin: <br>

    <input type="radio" name="admin" value=1/>Yes<br>
    <input type="radio" name="admin" value=0/>No<br>
   
        <input  type="submit" name="submit" value="Register" /> 
        
        <?php  $msg = "";
            if(isset($_POST['submit'])){
            
    
            if ($_POST['password'] !== $_POST['cpassword']){
            $msg = "Password does not match";
        
        
    }   else {
        $this->model->register_new_admin($_POST['user_id'], $_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['password'], $_POST['admin']);
    }
}

?>
        <span><?php echo $msg?></span>
      
        
        </form>
   
         </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
