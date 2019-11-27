<?php 
class colegiaturas extends Controller{
    function __construct(){
        parent::__construct();
        session_start();
        // $this->view->name = $_SESSION['usr_name']; 
        if(isset($_SESSION['usr_name']))
            $this->render();
        else
            new _error(403);
    }
    function render(){
        $this->view->render('colegiaturas/index');
    }
}
?>