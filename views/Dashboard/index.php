<link href="public/css/admin_dashboard.css" rel="stylesheet" type="text/css"/> 
<title> Sexy Salads | Admin Dashboard </title>   
</head>
<body>
<div id="header">
        <center><img src="views/pictures/admin.png" alt="adminlogo" id="adminlogo" style="vertical-align: middle"/><br> <h2>Welcome Admin!</h2></center>
    </div>
   
    
    <div id="sidebar">
        
        <ul style="list-style-type:none">
                <li><a class="active"> Manage articles</a></li>
                <li><a href="create">Create article</a></li>
                <li>Manage comments</li>
                <li>Manage users</li>
                <li>Home</li>
                <li>Log out</li>
        </ul>
        
    </div>
    
    <?php   $model = new Model();
        $posts = $model->getPublishedPosts();
        //print_r($posts);
        foreach ($posts as $post):?>
    
     <div id="data">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card" style="background-color: white;border-style: solid;border-width:2px">
                        <div class="clearfix" style="overflow: auto; height:200px">
                            <div class="card-block">
                                <div class="post_info">
				<h3><?php echo $post['title']; ?></h3>
                                <img src="<?php echo 'views/pictures/' . $post['image']; ?>" class="post_image" alt="" style='width:100%'>
                          
                                    <div class="info">
                                        <span><?php echo date("F j, Y ", strtotime($post["date_created"])) ?></span> 
                                    </div>
                                <form action="edit?post-slug=<?php echo $post['slug']?>" method="post" style="display:inline">
                                <input class="btn btn-primary" type="submit" name="edit" value="Edit"/>
                                
                               </form>
                               
                                <form action="" method="post" style="display:inline">
                                <input class="btn btn-primary" type="submit" name="edit" value="Delete"/>
                                
                               </form>
                            </div>
                          </div>
                          </div>
                    </div>
                </div>
                <?php  endforeach; ?>
            </div>
        </div>
     </div>
    
        
    
    
                      