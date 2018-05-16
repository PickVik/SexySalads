 <div class="col-md-3">
    <div class="card">
       
      <h2>Log In</h2>
      <div class="login">
          <form method="post" action="Login/run">
              <input type="text" id="username" name="username" placeholder="Username"><br>
              <input type="password" id="pwd" name="pwd" placeholder="Password"><br>
              <br>
              <button type="submit" id="btn" name="submit">Login</button>
              <a href="#">New? Register here</a>
                    
          </form>
      </div>
    </div>  
<div class="card">
      <h3>Search by category</h3>
      
      <?php 
      $topics = $model->getAllTopics();
      //print_r($topics);
      foreach ($topics as $topic) {?>
      <ul>
      <li><a href="<?php echo 'filtered_posts.php?topics=' . $topic['name']?>" id="topics">
         
      <?php echo $topic['name'];}?>
     
          </a>
      </li>
      </ul>
      
    </div>
    <div class="card">
      <h3>Subscribe to my Newsletter</h3>
      <p>Some text..</p>
    </div>
 </div>