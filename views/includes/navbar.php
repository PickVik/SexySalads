<?php session_start() ?>;


</head>
<body>
    
<div class="header">
          <div id="share-buttons">

  <!-- Email -->
    <a href="mailto:?Subject=Simple Share Buttons&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://simplesharebuttons.com">
        <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
    </a>
 <!-- Print -->
    <a href="javascript:;" onclick="window.print()">
        <img src="https://simplesharebuttons.com/images/somacro/print.png" alt="Print" />
    </a>
    <!-- Facebook -->
    <a href="http://www.facebook.com/sharer.php?u=https://simplesharebuttons.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
    </a>
    <!-- Pinterest -->
    <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
        <img src="https://simplesharebuttons.com/images/somacro/pinterest.png" alt="Pinterest" />
    </a>
    
     <!-- Twitter -->
    <a href="https://twitter.com/share?url=http://localhost/SexySalads&amp;text=Come try our Sexy Salads" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
    </a>
    
</div>
      </div>

<div class="topnav">
  <div class="col-md-12">
			<ul>
			  <li><a class="active" href="<?php echo URL; ?>index">Home</a></li>
                          <li class="dropdown"><a href="<?php echo URL; ?>recipes">Recipes</a>
  <!--<div class="dropdown-content">
    <a href="vegetarian">Vegetarian</a>
    <a href="meat">Meat</a>
    <a href="pasta">Pasta</a>
  </div>
                      -->    </li> 
                          
                          
                          <li>
				<a class="logo" href="<?php echo URL; ?>index"><h1>Sexy Salads</h1></a>
			</li>
			  
                       
			  <li><a href="<?php echo URL; ?>about">About</a></li>
                          
                          <?php if (!empty($_SESSION)){ ?>
                            <li><a href="<?php echo URL; ?>Admin">Admin</a></li>
                          <?php } ?>

			</ul>
                  </div>
</div>

