<p>New article view</p>

<form class="add_article" action='add_article' method='get'>
    
    <input type="hidden" name="article_id"/><br>
    <label>Title</label><input type="text" name="title" /><br>
    <label>Body</label><input type="text" name="body"  /><br>
    <label>Slug</label><input type="text" name="slug"  /><br>
    <label>Image</label><input type="text" name="image"  /><br>
    <label>User ID</label><input type="text" name="user_id"  /><br>
    <input type="hidden" name="date_created"/><br>
    <input type="hidden" name="last_updated"/><br>
    <input type="hidden" name="published"/><br>
    
    
    Topic <select name="topic">
        
        
        <?php foreach($objects as $topic) { ?>
  
         <?php echo $topic->topic_name; ?> &nbsp;
   
   

    <option value="<?php echo $topic->topic_id ?>"><?php echo $topic->topic_name; ?></option>
        
   
       <?php } ?> 
    </select>
    <br>
   
   
    <label>Add new article</label><input type="submit" name="submit" />
    
</form>
