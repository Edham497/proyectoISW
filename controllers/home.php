<?php 
class Home extends Controller{
    function __construct(){
        parent::__construct();
        $this->renderFile = "";
        $this->view->rol = "";
    }

    function setRenderFile(){
        
        switch($_SESSION['usr_role']){
            case 1:{
                // $this->renderFile = 'home/admin';
                $this->view->rol = 'Administrador';
                break;
            } 
            case 2:{
                // $this->renderFile = 'home/maestro';
                $this->view->rol = 'Maestro';
                break;
            } 
            case 3:{
                // $this->renderFile = 'home/pediatra';
                $this->view->rol = 'Pediatra';
                break;
            } 
            case 4:{
                // $this->renderFile = 'home/tutor';
                $this->view->rol = 'Tutor';
                break;
            } 
        }
        $this->renderFile = 'home/index';
    }

    function render(){
        if(isset($_SESSION['usr_role'])){
            self::setRenderFile();
            $this->view->render($this->renderFile);
        }else{
            new _error(401);
        }
    }
}
?>