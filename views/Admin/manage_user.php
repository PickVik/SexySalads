<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        
        <div class="container" style ="">
   
          
       
        <h2>Register new admin</h2>
        
        <form action='../admin/register_new_admin' method="post" > 
        
        <input class="form-control" type="hidden"  name="user_id" /> <br>
        Email Address:         <input class="form-control" type="email"  name="email" placeholder ="Email" /> <br>
        Password:              <input class="form-control" type="password" name="password" placeholder ="Password"/> <br>
        Confirm Password:      <input class="form-control" type="password"  name="cpassword" placeholder ="Confirm Password"/> <br>
        First Name:            <input class="form-control" type="text" name="first_name" placeholder ="First Name" /> <br>
        Last Name:           <input class="form-control" type="text" name="last_name" placeholder ="Second Name"/> <br>
        Admin: <br>

    <input type="radio" name="admin" value=1/>Yes<br>
    <input type="radio" name="admin" value=0/>No<br>
   
        <input  type="submit" name="submit" value="Register" /> 
        
        
      
        
        </form>
   
         </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
