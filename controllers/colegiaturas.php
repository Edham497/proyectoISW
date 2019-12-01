<?php 
class colegiaturas extends Controller{
    function __construct(){
        parent::__construct();
        $this->renderFile = '';

        //Bloqueo de no autorizados
        if(Router::isLoged()){
            switch($_SESSION['rol']){
                case 1: $this->renderFile = 'colegiaturas/index'; break;
                case 2: $this->renderFile = 'colegiaturas/recepcion'; break;
                case 5: $this->renderFile = 'colegiaturas/tutor'; break;
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