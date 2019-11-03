<?php 
class Home extends Controller{
    function __construct(){
        parent::__construct();
        $this->renderFile = "";
    }

    function setRenderFile(){
        // if(isset($_SESSION['user_role']))
        //     switch($_SESSION['user_role']){
        //         case 1: $this->renderFile = 'home/admin';break;
        //         case 2: $this->renderFile = 'home/maestro';break;
        //         case 3: $this->renderFile = 'home/pediatra';break;
        //         case 4: $this->renderFile = 'home/tutor';break;
        //     }
        // else new _error(401);
        $this->renderFile = 'home/index';
    }

    function render(){
        self::setRenderFile();
        $this->view->render($this->renderFile);
    }
}
?>