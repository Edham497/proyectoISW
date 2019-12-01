<?php 
class bitacoras extends Controller{
    function __construct(){
        parent::__construct();
        $this->renderFile = 'bitacoras/index';

        //Bloqueo de no autorizados
        if(Router::isLoged()){
            switch($_SESSION['rol']){
                case 1: $this->renderFile = 'bitacoras/index'; break;
                case 2: $this->renderFile = 'bitacoras/recepcion'; break;
                case 3: $this->renderFile = 'bitacoras/index'; break;
                case 4: $this->renderFile = 'bitacoras/index'; break;
                case 5: $this->renderFile = 'bitacoras/tutor'; break;
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