<?php 
class login extends Controller{
    function __construct(){
        parent::__construct();
        //Bloqueo de no autorizados
        Router::isLoged()?
            header('Location:' . constant('URL')) : $this->render();
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