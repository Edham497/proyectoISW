<?php 
class main extends Controller{
    function __construct(){
        parent::__construct();
        $this->renderFile = 'landing';
        
            session_start();
            if(isset($_SESSION['rol'])){
                switch($_SESSION['rol']){
                    case 1: $this->renderFile = 'main/admin'; break;
<<<<<<< HEAD
                    case 2: $this->renderFile = 'main/admin'; break;
                    case 3: $this->renderFile = 'main/tutor'; break;
=======
                    case 2: $this->renderFile = 'main/maestro'; break;
                    case 3: $this->renderFile = 'main/admin'; break;
>>>>>>> edham
                    case 4: $this->renderFile = 'main/admin'; break;
                    case 5: $this->renderFile = 'main/admin'; break;
                }
            }
        
        $this->render();
    }

    function render(){
        $this->view->render($this->renderFile);
    }
}
?>