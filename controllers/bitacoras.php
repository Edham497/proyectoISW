<?php 
class bitacoras extends Controller{
    function __construct(){
        parent::__construct();
        $this->renderFile = 'bitacoras/index';
        session_start();
        // $this->view->name = $_SESSION['usr_name']; 
        if(isset($_SESSION['usr_name'])){
            switch($_SESSION['rol']){
                case 1: $this->renderFile = 'bitacoras/index'; break;
                case 2: $this->renderFile = 'bitacoras/index'; break;
                case 3: $this->renderFile = 'bitacoras/index'; break;
                case 4: $this->renderFile = 'bitacoras/index'; break;
                case 5: $this->renderFile = 'bitacoras/tutor'; break;
            }
            $this->render();
        }
        else
            new _error(403);
    }
    function render(){
        $this->view->render($this->renderFile);
    }
}
?>