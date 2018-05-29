<style> body{color: #8f50e7}</style>
<title> Sexy Salads | Manage Images </title>
</head>

<body>
<button style="background-color: #8f50e7"><a href=../admin>Return to Admin page</a></button>


        
        
        <div class="container" style ="color:#8f50e7">

<h2 style="text-align: center">View all images</h2>
        <br>
<br>
<div class="container" style="margin-top:5px;width:75%;border-style:dotted;border-width:2px;padding:10px;" >
    
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
                
                 echo '<div class="flip" style="text-align: center">'; 
                 echo '<div class="front">'; 
                 echo '<img src="../' . $image . '" alt= "Random image" style="height:100%"/><br>';
                 echo '</div><br><br>'; 
                 echo '<div class="back">';
                 echo '<br>';
                 echo '<p style=word-wrap:break-word>';
                 echo basename($image);
                 echo '</p>';
                 //echo basename($image);
                 
                 echo '</div></div>';
                 }else{
                     
                     continue;
                 }
             }
             ?>       

    
    
    
    
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

        <script src="../public/JS/jquery.flip.min.js"></script>
        <script>
            $(function(){
    $(".flip").flip({
        trigger: 'hover'
    });
});
</script>