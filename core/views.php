<?php 
class Views{
    function __construct(){
        
    }

    function render($nombre){
        require_once "views/assets/head.php";
        require_once "views/components/navbar.php";
        require_once "views/$nombre.php";
    }

    function setComponent($component){
        
    }
}
?>