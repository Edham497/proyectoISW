<?php 
class asistencia extends Controller{
    function __construct(){
        parent::__construct();
        $this->renderFile;

        //Bloqueo de no autorizados
        if(Router::isLoged()){
            switch($_SESSION['rol']){
                case 1: $this->renderFile = 'asistencia/index'; break;
                case 2: $this->renderFile = 'asistencia/recepcion'; break;
                case 3: $this->renderFile = 'asistencia/index'; break;
                case 4: $this->renderFile = 'asistencia/index'; break;
                case 5: $this->renderFile = 'asistencia/tutor'; break;
                default: new _error(403);
            }
            $this->render();
        }else
            new _error(401);
        
    }
    function render(){
        $this->view->render($this->renderFile);
    }
}
?>