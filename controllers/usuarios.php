<?php

class Usuarios extends Controller{
    function __construct(){
        parent::__construct();
        $this->renderFile = 'login/signup';

        //if(self::isLoged()) header('Location:' . constant('URL'));
        
    }
    
    function render(){
        $this->view->render($this->renderFile);
    }
    
    function start(){
        //Verificamos si lo que se mando por Post es valido
        if($_POST['name'] && $_POST['apPat'] && $_POST['apMat'] && $_POST['email'] 
            && $_POST['pass'] && $_POST['telefono'] && $_POST['rol']){
            //consulta a la base de datos por medio del modelo
            $this->model->insertUser($_POST['name'],$_POST['apPat'],$_POST['apMat'],$_POST['email'],
            $_POST['pass'],$_POST['telefono'],$_POST['rol']);
            header('Location:' . constant('URL'));
        }
        //Si los campos no son validos redireccionamos con un error
        else header('Location:' . constant('URL') . 'usuarios/err');
        
    }
    function err(){
        echo '<h1>Bad Signup</h1>';
    }
}

?>