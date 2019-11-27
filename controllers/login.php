<?php 
class login extends Controller{
    function __construct(){
        parent::__construct();
        if(isset($_SESSION['usr_name']))
            new _error(403);
        else
            $this->render();
    }

    function render(){
        $this->view->render('login/index');
    }

    function end(){
            session_start();
            session_unset();
            session_destroy();
            //Al destruir la sesion hay que direccionar al login
            header('Location:' . constant('URL') . 'login');
    }
}
?>