<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
class User extends Controller{
    function __construct(){
        parent::__construct();
        $this->renderFile = 'login/signup';
        $this->view->empleados = "";
        //if(self::isLoged()) header('Location:' . constant('URL'));
        
    }
    
    function render(){
        $this->view->render($this->renderFile);
    }

    function read(){
        $this->renderFile = 'user/users';
        $this->view->empleados = $this->model->getUsers();
        $this->view->render($this->renderFile);
        //echo $row->fetch(PDO::FETCH_ASSOC);
    }
    
    function insert(){
        //Verificamos si lo que se mando por Post es valido
        if($_POST['name'] && $_POST['apPat'] && $_POST['apMat'] && $_POST['email'] 
            && $_POST['pass'] && $_POST['telefono'] && $_POST['rol']){
            //consulta a la base de datos por medio del modelo
            $this->model->insertUser($_POST['name'],$_POST['apPat'],$_POST['apMat'],$_POST['email'],$_POST['pass'],$_POST['telefono'],$_POST['rol']);
            header('Location:' . constant('URL'));
            //echo "funciona";
        }
        //Si los campos no son validos redireccionamos con un error
        else header('Location:' . constant('URL') . 'user/err');
        
    }
    function err(){
        echo '<h1>Bad Signup</h1>';
    }
    /*
    function users(){
        $this->renderFile = "user/users";
    }*/
}

?>