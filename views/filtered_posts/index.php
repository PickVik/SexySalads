	<title>Sexy Salads | Filtered </title>
<?php 

require 'views/includes/navbar.php'; ?>
<div class="row">
  <div class="col-md-9" id="main-content">
      <div class='card'>
      
      
     <?php 
            if (isset($_GET['topic'])) {
		$id = $_GET['topic'];
                $model = new Filtered_Posts_Model();
		$posts = $model->getPublishedPostsByTopic($id);
                //print_r($posts);
	}
             
            
     
     ?>
	<h2 class="content-title">
            <?php 
               $name = $model->getTopicNameById($id); echo $name; ?>
            Salads
                
	</h2>
	<hr>
	<?php   foreach ($posts as $post): ?>
        
        

		<div class="post" style="margin-left: 0px;width:49.5%;display:inline-block;padding:5px">
			<img src="<?php echo 'views/pictures/' . $post['image']; ?>" class="post_image" alt="$post['image']" style='width:100%'>
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
<?php require 'views/includes/sidebar.php'; 
