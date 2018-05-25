<style> body {color: #8f50e7}</style>
<title> Sexy Salads | Create New Article ?> </title>
</head>

<body>
<<<<<<< HEAD
    <button style="background-color: #8f50e7"><a href=../admin>Return to Admin page</a></button>
=======
    <button style="background-color: #8f50e7 "><a href="../admin/index">Return to Admin page</a></button>
>>>>>>> 2ec04c013672bfb02b65b42cfdd678cf2653f2e4
<h1 style="text-align: center">Create New Article</h1>
<br>
<br>
<div class="container" style="margin-top:5px;width:75%;border-style:dotted;border-width:2px;padding-bottom:10px;" >

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
<form action="" method="post" enctype="multipart/form-data">
    <h3><strong>Select file to upload:</strong></h3>
    <input type="file" name="fileToUpload" id="file">
    <input type="hidden" name="MAX_FILE_SIZE" value=2000000>
    <br><button type="submit" value="send">Upload</button>
</form>
</div>