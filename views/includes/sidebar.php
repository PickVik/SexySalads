

<div class="col-md-3">
    <div class="card">
       
      <h4>Log In</h4>
      <div class="login">
          <form method="post" action="Login/run">
              <input type="text" id="username" name="username" placeholder="Username"><br>
              <input type="password" id="pwd" name="pwd" placeholder="Password"><br>
              <br>
              <button type="submit" class="btn" name="submit">Login</button>
             <!-- <a href="#">New? Register here</a> -->
                    
          </form>
      </div>
    </div>  
<div class="card">
      <h4>Search by category</h4>
      
      <?php 
      $model = new Model();
      $topics = $model->getAllTopics();
      //print_r($topics);
      foreach ($topics as $topic) {?>
      <ul>
      <li><a href="<?php echo 'filtered_posts?topic=' . $topic['id']?>" id="topics">
         
      <?php echo $topic['name'];}?>
     
          </a>
      </li>
      </ul>
      
      
    </div>
    <div class="card">
      <h4>Subscribe to my Newsletter</h4>
      <p>Please type your email address below and I'll send you my recipe of the week</p>
      <form><input type='email' name='email' id='email' placeholder='Email'><br><br>
          <button type='submit' name='submit' class='btn'>Submit</button></form>
    </div>
 </div>