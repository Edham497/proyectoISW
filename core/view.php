<?php

class View{

    function __construct(){

    }

    function render($nombre){
        require_once "views/assets/head.php";
<<<<<<< HEAD

        //Validando componentes
        session_start();// este lo puse para que siguiera el menu del inicio del sesion
        if(isset($_SESSION['usr_name']))        
            require_once "views/components/user_navbar.php";
        else
           require_once "views/components/navbar.php";
=======
        require_once "views/components/navbar.php";
>>>>>>> edham
        require_once "views/$nombre.php";
    }
}

?>