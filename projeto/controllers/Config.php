<?php
    if(!defined('HOST')){
        define('HOST','localhost');   
    }
    
    if(!defined('USER')){
        define('USER','root2');  
    }
    if(!defined('USER2')){
        define('USER2','professor');  
    }
    if(!defined('PASS')){
        define('PASS','');  
    }    
    if(!defined('PASS2')){
        define('PASS2','professor');  
    }
    if(!defined('BD')){
        define('BD','Siteedu'); 
    }

    if(!defined('ABSPATH')){
        define('ABSPATH', dirname(__FILE__) . '/');
    }

    if(!defined('HEADER_TEMPLATE')){
        define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
    }
    if(!defined('FOOTER_TEMPLATE')){
        define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');
    }





?>