<?php
    if(isset($_REQUEST['view'])){
        $vista = $_REQUEST['view'];
    }else{
        $vista = "inicio";
    }
    switch($vista){
        case "inicio":{
            require_once './views/home.php';
            break;
        }
        case "login":{
            require_once './views/login.php';
            break;
        }
        case "registro":{
            require_once './views/registro.php';
            break;
        }
        default:{
            require_once './views/error404.php';
            break;
        }
    }
?> 