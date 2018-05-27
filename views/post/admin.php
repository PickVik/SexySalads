    <button style="background-color: #8f50e7"><a href=../admin>Return to Admin page</a></button>


<h1 style="text-align: center; color: purple;">Manage articles</h1>

<h2 style="text-align: center; color: purple;">Here is a list of all posts</h2>
<div class="container" style="color: purple;margin-top:5px;width:75%;border-style:dotted;border-width:2px;padding-bottom:10px;" >
<?php foreach($objects as $article) { ?>
  
   
   
    
    <a href='../single_post?post-slug=<?php echo $article->slug; ?>'><h3 style="color: purple;"><?php echo $article->title; ?></h3></a> &nbsp; &nbsp;
    
    <a href='../post/delete?article_id=<?php echo $article->article_id; ?>'><h5 style="color: purple;">Delete Post</h5></a> 
    <a href='../post/open_edit?article_id=<?php echo $article->article_id; ?>'><h5 style="color: purple;">Edit Post</h5></a> &nbsp;
  
<?php } ?> 
  </div>