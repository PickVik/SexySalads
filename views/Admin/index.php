<?php $model = new Model(); 
        $results= $model->search();

    if(!empty($_SESSION))
        {foreach($results as $result){?>
        
<link rel="stylesheet" href="../../public/css/admin_dashboard.css" type="text/css">
<title> Admin Dashboard </title>  
</head>

<div id="header" style="width: 100%;
    height: 120px;
    background: #8f50e7;
    color: white;
    padding-bottom: 5px;
    margin-left: 10px;
    margin-right:10px;">
    
    <center><img src="views/pictures/admin.png" alt="adminlogo" id="adminlogo" style="padding-top: 5px;
    pdding-botton: 2px;
    width: 50px;
    height: 50px;
    border-radius: 50px"/><br><h2><?php echo "Welcome " . $result['first_name'] . " ". $result['last_name'];}}?></h2></center>
    </div>
   
    
<div id="sidebar" 
    style="margin-top: 7px;
    margin-left: 10px;
    width: 220px;
    height: 700px;
    background: #8f50e7;
    float: left;">
    
       
        
        
        <ul style="list-style-type:none; padding: 40px; line-height: 300%">
               
           
                <li><a href='post/admin'>Manage articles</a></li>
                <li><a href='post/create_newarticle'>Create articles</a></li>
                <li><a href="">Manage comments</a></li>
                <li><a href="">Manage users</a></li>
                <li><a href="">Home</a></li>
                <li><a href='post/logout'>Log out</a></li>
        </ul>
    
    </div>


    
    <div id="data">
       
<div class="row">
  <div class="col-md-9">
      <div class='card'>
          
          <h2 class="content-title">All Recipes</h2>
          
<?php   $model = new Model();
        $posts = $model->getPublishedPosts();
        //print_r($posts);
        foreach ($posts as $post):?>
          
<div class="post" style="margin-left: 0px;width:49.5%;display:inline-block;padding:5px">
			<img src="<?php echo 'views/pictures/' . $post['image']; ?>" class="post_image" alt="" style='width:100%'>
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
    



 