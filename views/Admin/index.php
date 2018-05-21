<!DOCKTYPE html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="../../public/css/admin_dashboard.css" rel="stylesheet" type="text/css"/>
    <title> Admin Dashboard </title>   
</head>
<link href="../../public/css/admin_dashboard.css" rel="stylesheet" type="text/css"/>
<body>
    <div id="header">
        <center><img src="admin.png" alt="adminlogo" id="adminlogo"/><br> <h2>Welcome Admin!</h2></center>
    </div>
   
    
    <div id="sidebar">
        
        <ul style="list-style-type:none">
                <li>Manage articles</li>
                <li>Create article</li>
                <li>Manage comments</li>
                <li>Manage users</li>
                <li>Home</li>
                <li>Log out</li>
        </ul>
        
    </div>
    
    
    
    <div id="data">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="card">
                        <img src="../pictures/beetrootsalad.jpg" alt="beetroot" class="img-fluid"/>
                          <div class="card-block">
                            <div class="card-title">
                                <h4> Beetroot salad</h4>
                                <div class="card-text">The original recipe called
                                    for two beets instead of one beet and one carrot 
                                    and chopped mint instead of cilantro. 
                                </div>
                                <form action="" method="post">

                                <input class="btn btn-primary" type="submit" name="update" value="Update"/>
                                <input class="btn btn-primary" type="submit" name="delete" value="Delete"/>

                               </form>
                            </div>
                        </div>
                    </div>
                </div>
           
        
        
        
        
           
                <div class="col-md-4 col-lg-4">
                    <div class="card">
                        <img src="../pictures/green-salad.jpg" alt="green salad" class="img-fluid"/>
                        <div class="card-block">
                            <div class="card-title">
                                <h4> Green salad</h4>
                                <div class="card-text">The original recipe called
                                    for two beets instead of one beet and one carrot 
                                    and chopped mint instead of cilantro. 
                                </div>
                                <form action="" method="post">

                                <input class="btn btn-primary" type="submit" name="update" value="Update"/>
                                <input class="btn btn-primary" type="submit" name="delete" value="Delete"/>

                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            
        
        
        
            
                <div class="col-md-4 col-lg-4">
                    <div class="card">
                        <img src="../pictures/vegetarian.jpg" alt="beetroot" class="img-fluid"/>
                        <div class="card-block">
                            <div class="card-title">
                                <h4> Vegetarian salad</h4>
                                <div class="card-text">The original recipe called
                                    for two beets instead of one beet and one carrot 
                                    and chopped mint instead of cilantro. 
                                </div>
                                <form action="" method="post">

                                <input class="btn btn-primary" type="submit" name="update" value="Update"/>
                                <input class="btn btn-primary" type="submit" name="delete" value="Delete"/>

                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
    </div>
        </div>
    
    <div class="footer">
            
                <div class="copywrite">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="heart">&hearts;</i> by The Tech-sy Ladies
             
                </div>
        </div>
</body>
</html>
 