<?php if (isset($_GET['post-slug'])) {
                
                $controller = new Single_Post();
                $slug = $_GET['post-slug'];
                
        	$post = $controller->getPost($slug);
                //print_r($post);
                
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
                                    <div class='card-content'>
                          <!--      <div class="card">
                                <div class="card-block"> -->
			<?php   if ($post['published'] === 0): ?>
				<h2 class="post-title">Sorry... This post has not been published</h2>
			<?php else: ?>
				<h2 class="post-title"><?php echo $post['title']; ?></h2>
                                <hr>
                                
                                <img src="<?php echo $post['image']; ?>" class="post_image" alt="$post['slug']" style='width:100%;margin-bottom: 20px'>
                                
                                <div class="post-body-div">

                                    <p style='column-count: 4'>
                                
					<?php echo html_entity_decode($post['body']); ?>
                                    </p>
				</div>
			<?php endif ?>
                                </div>
                         


			<!-- // full post div -->
			
                        <!-- begin wwww.htmlcommentbox.com -->
 <div id="HCB_comment_box">
     <a href="http://www.htmlcommentbox.com">Widget</a> is loading comments...</div>
 <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
 <script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&opts=16862&num=10&ts=1526809026529");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
<!-- end www.htmlcommentbox.com -->
        
                                </div>
                            </div>
       
<?php include('views/includes/sidebar.php')?>

		


