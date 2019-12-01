<?php 
class alumnos extends Controller{
    function __construct(){
        parent::__construct();
        $this->renderFile;

        if(Router::isLoged()){
            switch($_SESSION['rol']){
                case 1: $this->renderFile = 'alumnos/admin'; break;
                case 2: $this->renderFile = 'alumnos/recepcion'; break;
                case 3: $this->renderFile = 'alumnos/index'; break;
                case 4: $this->renderFile = 'alumnos/index'; break;
                default: new _error(403);
            }
            $this->render();
        }else
            new _error(403);
        
    }
    function render(){
        $this->view->render($this->renderFile);
    }
}
?>