<style> body{color: #8f50e7}</style>
<title> Sexy Salads | Manage Users </title>
</head>

<body>
<button style="background-color: #8f50e7"><a href=../admin>Return to Admin page</a></button>


        
        
        <div class="container" style ="color:#8f50e7">
   
          
       
        <h2 style="text-align: center">Register new admin</h2>
        <br>
<br>
<div class="container" style="margin-top:5px;width:75%;border-style:dotted;border-width:2px;padding:10px;" >
        <form action='../admin/register_new_admin' method="post" > 
        
        Email Address:         <input class="form-control" type="email"  name="email" required placeholder ="Email" /> <br>
        Password:              <input class="form-control" type="password" name="password" required placeholder ="Password"/> <br>
        Confirm Password:      <input class="form-control" type="password"  name="cpassword" required placeholder ="Confirm Password"/> <br>
        First Name:            <input class="form-control" type="text" name="first_name" required placeholder ="First Name" /> <br>
        Last Name:           <input class="form-control" type="text" name="last_name" required placeholder ="Second Name"/> <br>
        Admin: <br>

    <input type="radio" name="admin" value=1/>Yes<br>
    <input type="radio" name="admin" value=0/>No<br>

        <input  class= "btn" style="background-color: #8f50e7" type="submit" name="submit" value="Register" /> 
        
        </form>
    
</div>
        </div>

    </body>
</html>
