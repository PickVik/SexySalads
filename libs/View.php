<?php

class View {

    function __construct() {
       // echo 'this is the view'; 
    }

    
    public function render($name, $objects=null, $noInclude = false) {
       
        if ($noInclude == true) {
                require 'views/' . $name . '.php';	
        }
        else {
                require 'views/includes/head_section.php';
                require 'views/' . $name . '.php';
                require 'views/includes/footer.php';	
        }
    }
}