<?php 
class main extends Controller{
    function __construct(){
        parent::__construct();
        $this->render();
        
    }

    function render(){
        $this->view->render('landing');
    }
}
?>