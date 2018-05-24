<div class="card">
            
    <h2 class="content-title">
        Search results           
    </h2>
    <hr/>

    <?php foreach($objects as $article) { ?>
//add conditional statement if $objects empty say there are no results 
        <div class="post" style="margin-left: 0px;width:49.5%;display:inline-block;padding:5px">
            <img src="views/pictures/<?php echo $article->image; ?>" class="post_image" alt="$post['image']" style="width:100%">
            <a href="single_post?post-slug=<?php echo $article->slug; ?>">
                <div class="post_info">
                    <h3><?php echo $article->title; ?></h3>
                    <div class="info">
                        <span><?php echo $article->date_created; ?> </span>
                        <span class="read_more">Read more...</span>
                    </div>                                       
                </div>
            </a>
        </div>

    <?php } ?> 
</div>
