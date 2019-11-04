<?php

require_once 'core/router.php';

class App{

    function __construct(){
        require_once 'controllers/_err.php';

        //Ruteando las secciones de la app
        if (isset($_GET['url']))
            Router::get($this->getURLArray());    
        
        // Render del Inicio
        else {
            //Verificamos si hay una seccion iniciada
            if(self::is_session_started()){
                // renderizamos home (El controlador de home se encarga de 
                // renderizar la seccion del rol iniciado)
                require_once 'controllers/home.php';
                Router::prepareModule(new Home());
            }
            else{
                //renderizamos home
                require_once 'controllers/main.php';
                Router::prepareModule(new main());
            }
        }
    }

    function getURLArray(){
        $URL = $_GET['url'];            //Obtenemos la URL
        $URL = rtrim($URL, '/');        //elimina espacios en blanco
        $URL = explode('/', $URL);      //Convierte el string en un array, similar al split de java
        return $URL;
    }

    static function is_session_started(){
        session_start();
        return isset($_SESSION['usr_name']);
    }
}
