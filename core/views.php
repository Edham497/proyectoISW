<?php 
class View{
    function __construct(){
    }
    
    function render($renderFile){
        $this->setComponent("head");
        $this->setComponent('navbar');
        require_once "views/$renderFile.php";
    }

    // Funcion para agregar componentes a las vistas
    function setComponent($component){
        require_once "components/$component.php";
    }
}
?>