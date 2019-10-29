<?php

require_once 'core/router.php';

class App{

    function __construct(){
        require_once 'controllers/_err.php';
        
        if(isset($_GET['url']))
            Router::get($this->getURLArray());

        else{
            require_once 'controllers/main.php';
            // $controlador = new main();
            Router::prepareModule(new main());
            // $controlador->render();
        }
    }

    function getURLArray(){
        $URL = $_GET['url'];            //Obtenemos la URL
        $URL = rtrim($URL, '/');        //elimina espacios en blanco
        $URL = explode('/', $URL);      //Convierte el string en un array, similar al split de java
        return $URL;
    }
}

?>