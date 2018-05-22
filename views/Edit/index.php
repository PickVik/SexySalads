<?php if (isset($_GET['post-slug'])) {
                
                $model = new Model();
                $slug = $_GET['post-slug'];
                
        	$post = $model->getPost($slug);
                //print_r($post);
                
	}
        
        
?>

<style> body {color: #8f50e7}</style>
<title> Sexy Salads | Edit <?php echo $post['title'] ?> </title>
</head>

<body>

<div class="container" style="border-style:dotted;border-width:2px;padding-bottom:10px;display:inline-block;margin:5px" >
        <form action="" method="post">
                                <h3> <strong> Title <br></strong></h3>
                                <input type="text" name="title" id="title" value="<?php echo $post ['title']; ?>" size="100" ><br>
                               
                            <h3> <strong>Slug <br></strong></h3>
                            <input type="text" name="slug" value="<?php echo $post ['slug'];?>" size="100"><br>
                                
                            <h3> <strong>Body <br></strong></h3>
                            <textarea name="body" rows=10 cols="105"><?php echo $post ['body']; ?></textarea><br>
          
                            <h3> <strong>Image <br></strong></h3>
                            <input type="text" name="image" value="<?php echo $post ['image']; ?>" size="100"><br>
                            <h3> <strong>Published <br></strong></h3>
                            <input type="text" name="published" value="<?php echo $post ['published']; ?>" size="100"><br>
                            <br>
                                <input type="submit" name="submit" value="Edit"><br>
        </form>
    </div>	
