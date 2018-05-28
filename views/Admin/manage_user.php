
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
        
        
    </body>
</html>
