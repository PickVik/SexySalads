

<h1>Manage articles</h1>

<p>Here is a list of all posts</p>

<?php foreach($objects as $article) { ?>
  <p>
    <?php echo $article->title; ?> &nbsp; &nbsp;
   
    <a href='../post/delete?article_id=<?php echo $article->article_id; ?>'>Delete Post</a> &nbsp; &nbsp;
    <a href='../post/open_edit?article_id=<?php echo $article->article_id; ?>'>Edit Post</a> &nbsp;
  </p>
<?php } ?> 