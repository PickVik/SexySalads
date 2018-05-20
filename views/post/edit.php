<p>Edit view</p>

<form class="edit_article" action='update' method='get'>
    
    <input type="hidden" name="article_id" value="<?= $objects->article_id; ?>"/><br>
    <label>Title</label><input type="text" name="title" value="<?= $objects->title; ?>"/><br>
    <label>Article</label><input type="text" name="body" value="<?= $objects->body; ?>" /><br>
   
    <label>Update!</label><input type="submit" name="submit" />
    
</form>
