

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
        
        <?php 

require 'views/includes/navbar.php'; ?>
<div class="row">
  <div class="col-md-9">
      <div class='card'>
          
          <h2 class="content-title">All Recipes</h2>
          
<?php   $model = new Model();
        $posts = $model->getPublishedPosts();
        //print_r($posts);
        foreach ($posts as $post):?>
          
<div class="post" style="margin-left: 0px;width:49.5%;display:inline-block;padding:5px">
			<img src="<?php echo $post['image']; ?>" class="post_image" alt="" style='width:100%'>
			<a href="single_post?post-slug=<?php echo $post['slug']; ?>">
				<div class="post_info">
					<h3><?php echo $post['title']; ?></h3>
					<div class="info">
        <span><?php echo date("F j, Y ", strtotime($post["date_created"])) ?></span>
						<span class="read_more">Read more...</span>
					</div>
                                        
                                </div>
			</a>
		</div>
        <?php  endforeach; ?>
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