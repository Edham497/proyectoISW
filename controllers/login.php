<?php

class Login extends Controller{
    function __construct(){
        parent::__construct();
        $this->renderFile = 'login/index';

        if(self::isLoged()) header('Location:' . constant('URL'));
        
    }
    
    function render(){
        $this->view->render($this->renderFile);
    }
    
    function start(){
        //Verificamos si lo que se mando por Post es valido
        if($_POST['usrname'] && $_POST['pass']){
            
            //consulta a la dase de datos por medio del modelo
            $USER = $this->model->checkUser($_POST['usrname'], $_POST['pass']);

            if($USER['usrname']){

                session_start();
                $_SESSION['usr_name'] = $USER['usrname'];
                $_SESSION['usr_role'] = $USER['rol'];
                $_SESSION['usr_roleName'] = 'undefined';
                
                //Asignamos el nombre del rol para la barra de navegacion
                switch($_SESSION['usr_role']){
                    case 1: $_SESSION['usr_roleName'] = 'Administrador'; break; 
                    case 2: $_SESSION['usr_roleName'] = 'Maestro'; break; 
                    case 3: $_SESSION['usr_roleName'] = 'Pediatra'; break; 
                    case 4: $_SESSION['usr_roleName'] = 'Tutor'; break; 
                }
                
                //Redireccionamios a home
                header('Location:' . constant('URL'));
            }
            else{
                //Si no existe no aseguramos que no tengamos informacion en la sesion
                self::end();
                header('Location:' . constant('URL') . 'login/err');
            }
        }
        //Si los camos no son validos redireccionamos con un error
        else header('Location:' . constant('URL') . 'login/err');
        
    }

    function end(){
        session_start();
        session_unset();
        session_destroy();
    }

    function isLoged(){
        session_start();
        return isset($_SESSION['usr_name']);
    }
    
    function err(){
        // session_start();
        echo '<h1>Bad Loggin</h1>';
    }

    function pass_recovery(){
        $this->renderFile = 'login/pass_recovery';
    }
}

?>