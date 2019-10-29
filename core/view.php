<?php

class View{

    function __construct(){

    }

    function render($nombre){
        require_once "views/assets/head.php";
        require_once "views/components/header.php";
        require_once "views/$nombre.php";
        require_once "views/assets/footer.php";
    }
}

?>