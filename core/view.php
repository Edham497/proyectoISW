<?php

class View{

    function __construct(){

    }

    function render($nombre){
        require_once "views/assets/head.php";

        //Validando componentes
        if(App::is_session_started())        
            require_once "views/components/user_navbar.php";
        else
            require_once "views/components/navbar.php";
        
        require_once "views/$nombre.php";
    }
}

?>