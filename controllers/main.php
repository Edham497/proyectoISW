<?php 
class main extends Controller{
    function __construct(){
        parent::__construct();
        $this->renderFile = 'landing';
        
            session_start();
            switch($_SESSION['rol']){
                case 1: $this->renderFile = 'main/admin'; break;
                case 2: $this->renderFile = 'main/admin'; break;
                case 3: $this->renderFile = 'main/admin'; break;
                case 4: $this->renderFile = 'main/admin'; break;
                case 5: $this->renderFile = 'main/admin'; break;
            }
        
        $this->render();
    }

    function render(){
        $this->view->render($this->renderFile);
    }
}
?>