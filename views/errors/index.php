<?php

require 'views/includes/head_section.php';
require 'views/includes/navbar.php';
?>

<div class='row'>
    <div class='col-md-9'>
            <div class="card" style='margin-right:0'>
                <div class="card-body">


                    <h1 class='card-title'>  Uh oh! Something went wrong!</h1><hr>
                    
         <div class='clearfix' style='overflow: auto'>           
             <img src="views/pictures/sad.jpg" alt='sad face' style='width:35%;float:left;margin-right: 10px'>

   
    <h2 class='span'
        style='display: inline-block;vertical-align: middle;line-height: normal;'>
            <?php echo $this->msg; ?></h2>
    
         </div>
                </div>
    </div>
</div>
<?php require 'views/includes/sidebar.php'; 