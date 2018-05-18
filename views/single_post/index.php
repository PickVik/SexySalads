<?php if (isset($_GET['post-slug'])) {
                
                $controller = new Single_Post();
                $slug = $_GET['post-slug'];
            
        	$post = $controller->getPost($slug);
               // print_r($post);
                
	}
        
        $model = new Model();
	$topics = $model->getAllTopics();
?>
<title> <?php echo $post['title'] ?> </title>



	<!-- Navbar -->
      <?php include ( 'views/includes/navbar.php') ?>      
	<!-- // Navbar -->
	
	<div class="row" >
                            <div class="col-md-9">
                                <div class="card">
                                <div class="card-block">
			<?php   if ($post['published'] === 0): ?>
				<h2 class="post-title">Sorry... This post has not been published</h2>
			<?php else: ?>
				<h2 class="post-title"><?php echo $post['title']; ?></h2>
                                <div class="post-body-div">

                                
                                <img src="<?php echo 'views/pictures/' . $post['image']; ?>" class="post_image" alt="" style='width:70%;float:right;margin-left:20px;margin-bottom:20px'>
                                
					<?php echo html_entity_decode($post['body']); ?>
				</div>
			<?php endif ?>
                            </div>
                        </div>
                </div>
        
			<!-- // full post div -->
			
			<!-- comments section -->
			<!--  coming soon ...  -->
        

       
<?php include('views/includes/sidebar.php')?>

		


