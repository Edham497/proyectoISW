<?php 
class login extends Controller{
    function __construct(){
        parent::__construct();
        $this->render();
    }

    function render(){
        $this->view->render('login/index');
    }

    function end(){
            // session_start();
            session_unset();
            session_destroy();
            header('Location:' . constant('URL') . 'login');
    }
}
?>