<?php 
class Alumnos extends Controller{
    function __construct(){
        parent::__construct();
        $this->renderFile = 'alumnos/index';
    }
    
    function inscribir(){
        $this->renderFile = 'alumnos/inscripcion';
    }

    function render(){
        $this->view->render($this->renderFile);
    }
}?>