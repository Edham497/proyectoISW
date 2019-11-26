<?php 

require_once 'core/controller.php';
require_once 'core/view.php';


define('URL', '/proyectoISW/');

class Router{
    function __construct(){
        $URL = $this->getURLArray();
        // var_dump($URL);
        if($URL[0]){
            if($URL[0] == 'API'){
                require_once 'controllers/api.php';
                $API = new API($URL);
                return;
            }
            $controllerPath = $this->getController($URL);
            if(file_exists($controllerPath)){
                require_once $controllerPath;
                $controller = new $URL[0];
                if(isset($URL[1]) && method_exists($controller, $URL[1]))
                    $controller->{$URL[1]}(isset($URL[2])?$URL[2]:'');
            }else{
                echo "no se arma";
            }
        }else{
            require_once 'controllers/main.php';
            $controller = new main();
        }
    }

    function getURLArray(){
        if(isset($_GET['url'])){
            $URL = $_GET['url'];            //Obtenemos la URL
            $URL = rtrim($URL, '/');        //elimina espacios en blanco
            $URL = explode('/', $URL);      //Convierte el string en un array, similar al split de java
            return $URL;
        }else return null;
    }

    function getController($URL){
        return 'controllers/'.$URL[0].'.php';
    }
}