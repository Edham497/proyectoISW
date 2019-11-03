<?php

class Log extends Controller{
    function __construct(){
        parent::__construct();
        $this->renderFile = 'log/index';
        if(self::isLoged()) header('Location:' . constant('URL'));
    }
    
    function render(){
        $this->view->render($this->renderFile);
    }
    
    
    function logIn(){
        //Verificamos si lo que se mando por Post es valido
        if($_POST['usrname']){
            //Si lo es lo guardamos en la variable de sesion
            session_start();
            $_SESSION['usrname'] = $_POST['usrname'];
            header('Location:' . constant('URL'));
        }
        else header('Location:' . constant('URL') . 'log/err');
        
    }

    function logOut(){
        session_start();
        session_unset();
        session_destroy();
    }

    function isLoged(){
        return isset($_SESSION['usrname']);
    }
    
    function err(){
        session_start();
        echo '<h1>Bad Loggin</h1>';
    }
}

?>