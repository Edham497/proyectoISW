<?php 
class usuarios extends Controller{
    function __construct(){
        parent::__construct();
        $this->renderFile = '';

        //Bloqueo de no autorizados
        if(Router::isLoged()){
            switch($_SESSION['rol']){
                case 1: $this->renderFile = 'usuarios/admin'; break;
                case 2: $this->renderFile = 'usuarios/recepcion'; break;    
                default: new _error(403);
            }
            $this->render();
        }
        else new _error(403);
    }
    function render(){
        $this->view->render($this->renderFile);
    }
}
?>