<?php  $msg = "";
if(isset($_POST['submit'])){
foreach($_POST as $key=>$value) {
            if(empty($_POST[$key])) {
            $msg = "All Fields are required";
            break;
        }
    
        if ($password !== $cpassword){
            $msg = "Password does not match";
        
        
    }   else {
        $this->model->register_new_admin($_POST['user_id'], $_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['password'], $_POST['admin']);
    }
}
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        
        <div class="container" style ="">
   
          
       
        <h2>Register new admin</h2>
        
        <form action='../admin/register_new_admin' method="post" > 
        
        Email Address:         <input class="form-control" type="email"  name="email" placeholder ="Email" /> <br>
        Password:              <input class="form-control" type="password" name="password" placeholder ="Password"/> <br>
        Confirm Password:      <input class="form-control" type="password"  name="cpassword" placeholder ="Confirm Password"/> <br>
        First Name:            <input class="form-control" type="text" name="first_name" placeholder ="First Name" /> <br>
        Last Name:           <input class="form-control" type="text" name="last_name" placeholder ="Second Name"/> <br>
        Admin: <br>

    <input type="radio" name="admin" value=1/>Yes<br>
    <input type="radio" name="admin" value=0/>No<br>
   
        <input  type="submit" name="submit" value="Register" /> 
        
        
        <span><?php echo $msg?></span>
      
        
        </form>
   
         </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
