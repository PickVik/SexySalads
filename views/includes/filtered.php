<div class="row">
  <div class="col-md-9">
    <div class="card">
      
     <?php 
            if (isset($_GET['topic'])) {
		$id = $_GET['topic'];
                $controller = new Filtered_Posts();
		$posts = $controller->getPublishedPostsByTopic($id);
                //print_r($posts);
	}
             
            
     
     ?>
	<h2 class="content-title">
            <?php 
               $name = $controller->getTopicNameById($id); echo $name; ?>
            Salads
                
	</h2>
	<hr>
	<?php   foreach ($posts as $post): ?>
		<div class="post" style="margin-left: 0px;">
			<img src="<?php echo 'views/pictures/' . $post['image']; ?>" class="post_image" alt="" style='width:100%'>
			<a href="single_post?post-slug=<?php echo $post['slug']; ?>">
				<div class="post_info">
					<h3><?php echo $post['title']; ?></h3>
					<div class="info">
        <span><?php echo date("F j, Y ", strtotime($post["created_at"])) ?></span>
						<span class="read_more">Read more...</span>
					</div>
				</div>
			</a>
		</div>
        <?php  endforeach; ?>
        </div>
    </div>

