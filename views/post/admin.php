<style> body{color: #8f50e7}</style>
<title> Sexy Salads | Manage Articles </title>
</head>

<body>
<button style="background-color: #8f50e7"><a href=../admin>Return to Admin page</a></button>




<h1 style="text-align: center">Manage articles</h1>

<h2 style="text-align: center">Here is a list of all posts</h2>
<br>
<br>
<div class="container" style="margin-top:5px;width:75%;border-style:dotted;border-width:2px;padding-bottom:10px;" >  
    <?php foreach($objects as $article) { ?>
<div class="row" style="display:inline-block;margin-left:5px">
                             <div class ="clearfix" style="overflow:auto">

          <div class="col-sm-3"> 
              
             <div class="card-deck">
                 
               <div class="card-group">
  <div class="card" style="background-color: white;border-style: solid;border-width:2px;width:200px;height:250px">
    <img class="card-img-top" src="<?php echo '../views/pictures/' . $article->image; ?>" alt="<?php echo $article->image?>" style="width:100%">
    <div class="card-body">
      <h5 class="card-title"><?php echo $article->title; ?></h5>
      <div class="card-footer">
          <small class="text-muted"><?php echo date("F j, Y ", strtotime($article->date_created)) ?></small><br>
          
          
    
      <button style="background-color: #8f50e7; margin-top:5px"><a href='../post/delete?article_id=<?php echo $article->article_id; ?>'>Delete Post</a> </button>
      <button style="background-color: #8f50e7"><a href='../post/open_edit?article_id=<?php echo $article->article_id; ?>'>Edit Post</a></button> &nbsp;  
    </div>
  </div>
  </div>     
                
            </div>
      </div>
    </div>
        </div>
                

      </div>
    <?php  }; ?>
</div>

