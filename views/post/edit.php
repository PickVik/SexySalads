<link href="public/css/admin_dashboard.css" rel="stylesheet" type="text/css"/> 
<style> body {color: #8f50e7}</style>
<title> Sexy Salads | Edit <?php echo $objects->title ?> </title>
</head>

<body>
        <button style="background-color: #8f50e7 "><a href="../admin">Return to Admin page</a></button>

    <h1 style="text-align: center">Edit: <strong><?php echo $objects->title?></strong></h1>
    <br>
    <br>
   
    
<div class="container" style="margin-top:5px;width:75%;border-style:dotted;border-width:2px;padding-bottom:10px;" >

<form class="edit_article" action='update' method='post' enctype="multipart/form-data">
    
    <input type="hidden" name="article_id" value="<?= $objects->article_id; ?>" /><br>
        <h3> <strong> Title <br></strong></h3>
             <input type="text" name="title" value="<?= $objects->title; ?>" size="100" ><br>
        <h3> <strong>Slug <br></strong></h3>
            <input type="text" name="slug" value="<?= $objects->slug;?>" size="100"><br>
        <h3> <strong>Body <br></strong></h3>
            <textarea name="body" rows=10 cols="105"><?= $objects->body; ?>" </textarea><br>
        
       <h3> <strong>Published <br></strong></h3>

    <input type="radio" name="published" value=1/>Yes<br>
    <input type="radio" name="published" value=0/>No<br>
                        
    
    <br>
    <h3>Upload your picture here</h3>
    <br>
    
    Supported format: Jpeg <input type="file" name="myfile"/><br>
    
                            <input type="submit" name="submit" value="update" /><br>
                            <br>
        <!--<a href="admin" style="color:#8f50e7"><strong>Leave without editing</strong></a>-->

    
</form>
</div>