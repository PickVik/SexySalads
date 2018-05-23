<style> body {color: #8f50e7}</style>
<title> Sexy Salads | Create <?php echo $post['title'] ?> </title>
</head>

<body>
<div class="container" style="margin-top:5px;width:75%;border-style:dotted;border-width:2px;padding-bottom:10px;" >
        <form action='add_article' method='get'>
                                <h3> <strong> Title <br></strong></h3>
                                <input type="text" name="title" id="title" value="" size="100" ><br>
                               
                            <h3> <strong>Slug <br></strong></h3>
                            <input type="text" name="slug" value="" size="100"><br>
                                
                            <h3> <strong>Body <br></strong></h3>
                            <textarea name="body" rows=10 cols="105"></textarea><br>
          
                            <h3> <strong>Image <br></strong></h3>
                            <input type="text" name="image" value="" size="100"><br>
                            <h3> <strong>Published <br></strong></h3>
                            <input type="text" name="published" value="" size="100"><br>
                            <br>
                                <input type="submit" name="submit" value="Create"><br>
        </form>
    </div>	
