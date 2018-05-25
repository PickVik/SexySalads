<link rel="stylesheet" href="public/css/admin_dashboard.css" type="text/css">
<title> Sexy Salads | Admin Dashboard </title>   
</head>
<body>
  
    
<div id="header">
        <center><img src="views/pictures/admin.png" alt="adminlogo" id="adminlogo" style="vertical-align: middle"/><br> <h2>Welcome Admin!</h2></center>
    </div>
   <div class="container-fluid">
    <div class="sidebar-wrapper">
    
   <ul class="nav nav-pills nav-stacked col-md-2">
  <li class="active"><a href="#tab_a" data-toggle="pill">Manage Articles</a></li>
  <li><a href="#tab_b" data-toggle="pill">Create Article</a></li>
  <li><a href="#tab_c" data-toggle="pill">Manage Images</a></li>
  <li><a href="#tab_d" data-toggle="pill">Manage Users</a></li>
  <li><a href="index" data-toggle="pill">Logout</a></li>
</ul>
        
<div class="tab-content col-md-10">
        <div class="tab-pane active" id="tab_a">
            
             <?php   $model = new Model();
        $posts = $model->getPublishedPosts();
        //print_r($posts);
        foreach ($posts as $post): ?>
      <div class="row" style="display:inline-block">
                             <div class ="clearfix" style="overflow:auto">

          <div class="col-sm-3"> 
              
             <div class="card-deck">
                 
               <div class="card-group">
  <div class="card" style="background-color: white;border-style: solid;border-width:2px;width:200px;height:250px">
    <img class="card-img-top" src="<?php echo 'views/pictures/' . $post['image']; ?>" alt="<?php echo $post['image']?>" style="width:100%">
    <div class="card-body">
      <h5 class="card-title"><?php echo $post['title']; ?></h5>
      <div class="card-footer">
      <small class="text-muted"><?php echo date("F j, Y ", strtotime($post["date_created"])) ?></small>
    </div>
      <form action="" method="post" style="display:inline">
    
     <input class="btn btn-primary" onclick="myFunction()" type="submit" name="edit" value="Edit"/>
     
                
                               </form>
                               
                                <form action="" method="post" style="display:inline">
                                <input class="btn btn-primary" type="submit" name="edit" value="Delete"/>
                                
                               </form>    </div>
  </div>
            
                
            </div>
      </div>
    </div>
        </div>
      </div>

            <?php  endforeach; ?>
            <div id="edit" style="display:none;margin-top:5px;width:75%;border-style:dotted;border-width:2px;padding-bottom:10px;" >

<form class="edit_article" action='update' method='get'>
    
    <input type="hidden" name="article_id" value="<?= $objects->article_id; ?>" /><br>
        <h3> <strong> Title <br></strong></h3>
             <input type="text" name="title" value="<?= $objects->title; ?>" size="100" ><br>
        <h3> <strong>Slug <br></strong></h3>
            <input type="text" name="slug" value="<?= $objects->slug;?>" size="100"><br>
        <h3> <strong>Body <br></strong></h3>
            <textarea name="body" rows=10 cols="105"><?= $objects->body; ?>" </textarea> /><br>
        <h3> <strong>Image <br></strong></h3>
            <input type="text" name="image" value="<?= $objects->image; ?>" size="100"><br>
        <h3> <strong>Published <br></strong></h3>
            <input type="text" name="published" value="<?= $objects->published; ?>" size="100"><br>
                            <br>
                            <input type="submit" name="submit" value="update" /><br>
                            <br>
        <!--<a href="admin" style="color:#8f50e7"><strong>Leave without editing</strong></a>-->

    
</form>
</div>
        </div>
     
        <div class="tab-pane" id="tab_b">

<div class="container" style="margin-top:10px;width:95%;border-style:dotted;border-width:2px;padding-bottom:10px;" >

<form action='add_article' method='get'>
    
    <input type="hidden" name="article_id"/><br>
        <h3> <strong> Title <br></strong></h3>
    <input type="text" name="title" size="100"/><br>
        <h3> <strong>Body <br></strong></h3>
    <textarea name="body" rows=10 cols="105"></textarea><br>
        <h3> <strong>Slug <br></strong></h3>
    <input type="text" name="slug"  size="100"/><br>
        <h3> <strong>Image <br></strong></h3>
        
    <input type="text" name="image"  size="100"/><br>

    
    
    
        <h3> <strong>User ID <br></strong></h3>
    <input type="text" name="user_id"  size="100"/><br>
    <input type="hidden" name="date_created"/><br>
    <input type="hidden" name="last_updated"/><br>
            <h3> <strong>Published <br></strong></h3>

    <input type="radio" name="published" value="true"/>Yes<br>
    <input type="radio" name="published" value="false"/>No<br>

    
    
    <h3><strong>Topic<br></strong></h3>
        <select name="topic">
        
        
        <?php foreach($objects as $topic) { ?>
  
         <?php echo $topic->topic_name; ?> &nbsp;
   
   

    <option value="<?php echo $topic->topic_id ?>"><?php echo $topic->topic_name; ?></option>
        
   
       <?php } ?> 
    </select>
    
    <br>
    <br>
   
    <input type="submit" name="Add New Article" />
    
</form>

</div>
        </div>
        <div class="tab-pane" id="tab_c">
             <h3 style="text-align: center;">Manage Images:</h3>
             <br>
             <div class="row" style="margin-left:100px;display:inline-block">
                 <div class="col-md-3">
             <?php 
             $files = glob("views/pictures/*.*");
             for ($i = 0; $i < count ($files); $i++) {
                 $image = $files[$i];
                 $supported_file = array(
                     'gif',
                     'jpg',
                     'jpeg',
                     'png'
                 );
                 
                 $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                 if(in_array($ext, $supported_file))
                 {               
                
                 echo '<div class="flip">'; 
                 echo '<div class="front">'; 
                 echo '<img src="' . $image . '" alt= "Random image" width=30% /><br>';
                 echo '</div>'; 
                 echo '<div class="back">';
                 echo '<br>';
                 echo '<h3>';
                 echo basename($image);
                 echo '</h3>';
                 //echo basename($image);
                 
                 echo '</div></div>';
                 }else{
                     
                     continue;
                 }
             }
             ?>
                 </div>
             </div>
             <div class="row" style="border:1px dotted #8f50e7;display:inline-block;float:right;padding: 30px;margin-right:100px">
                 <div class="col-md-12">
                 <form action="" method="post" enctype="multipart/form-data">
    <h3><strong>Upload New Image Here:</strong></h3>
    <input type="file" name="fileToUpload" id="file">
    <input type="hidden" name="MAX_FILE_SIZE" value=2000000>
    <br><button type="submit" value="send">Upload</button>
</form>
             </div>
             </div>
        </div>
        <div class="tab-pane" id="tab_d">
             <h4>Manage Users here</h4>
            
        </div>
</div><!-- tab content -->
    </div>
   </div>

    
  
    <script> 
        var edit = document.getElementById("edit").innerHTML;
        
        function myFunction() {
        document.getElementById("tag_a").innerHTML = "<div id=\"edit\" style="margin-top:5px;width:75%;border-style:dotted;border-width:2px;padding-bottom:10px;\" >

<form class=\"edit_article\" action='update' method='get'>
    
    <input type=\"hidden\" name=\"article_id\" value=\"<?= $objects->article_id; ?>\" /><br>
        <h3> <strong> Title <br></strong></h3>
             <input type=\"text\" name=\"title\" value=\"<?= $objects->title; ?>\" size=\"100\" ><br>
        <h3> <strong>Slug <br></strong></h3>
            <input type=\"text\" name=\"slug\" value=\"<?= $objects->slug;?>\" size=\"100\"><br>
        <h3> <strong>Body <br></strong></h3>
            <textarea name=\"body\" rows=10 cols=\"105\"><?= $objects->body; ?>\" </textarea> /><br>
        <h3> <strong>Image <br></strong></h3>
            <input type=\"text\" name=\"image\" value=\"<?= $objects->image; ?>\" size=\"100\"><br>
        <h3> <strong>Published <br></strong></h3>
            <input type=\"text\" name=\"published\" value=\"<?= $objects->published; ?>\" size=\"100\"><br>
                            <br>
                            <input type=\"submit\" name=\"submit\" value=\"update\" /><br>
                            <br>
        <!--<a href="admin" style="color:#8f50e7"><strong>Leave without editing</strong></a>-->

    
</form>
</div>";
        

}
        </script>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

        <script src="public/JS/jquery.flip.min.js"></script>
        <script>
            $(function(){
    $(".flip").flip({
        trigger: 'hover'
    });
});
</script>