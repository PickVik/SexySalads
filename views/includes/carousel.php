
<div class="row">
  <div class="col-md-9">
    <div class="card">
      
     
      
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        
        <?php 
        $model = new Index_Model();
        $posts = $model->getPublishedPosts();
        //print_r($posts);
        foreach ($posts as $post): 
            //print_r($post['image']);?>
        
	<div class="item">
		<img src="<?php echo 'views/pictures/' . $post['image']; ?>" class="post_image" alt="" style="width:100%;height:100%">
        <!-- Added this if statement... -->
		<?php if (isset($post['topic']['topic_name'])): ?>
			<a 
				href="<?php echo 'filtered_posts?topic=' . $post['topic']['topic_id'] ?>"
				class="btn category">
				<?php echo $post['topic']['topic_name'] ?>
			</a>
		<?php endif ?>

		<a href="single_post?post-slug=<?php echo $post['slug']; ?>"> 
			<div class="carousel-caption">
				<h3><?php echo $post['title'] ?></h3>
				<div class="info">
					<span><?php echo date("F j, Y ", strtotime($post["date_created"])); ?></span>
					<span class="read_more">Read more...</span>
				</div>
			</div>
		</a>
	</div>
<?php endforeach ?>

     <div class="item active">
          <img src="views/pictures/green-salad.jpg" alt="Green Salad">
          <div class='carousel-caption'>
              <h3>Scroll through all our latest posts</h3>
              
          </div>

  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
  </div>
  </div>