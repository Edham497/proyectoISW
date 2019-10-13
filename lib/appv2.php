<?php

require_once 'lib/router.php';

class App{
    function __construct(){
        require_once 'controllers/_err.php';
        
        if(isset($_GET['url']))
            Router::get($this->getURLArray());
        
        // if(isset($_GET['url'])){
        //     $url = $this->getURLArray();
            
        //     if(isset($url[0]) && $url[0]){
        //         $archivoControlador = $this->getControllerPath($url);

        //         if(file_exists($archivoControlador)){
        //             require_once $archivoControlador;
        //             $controlador= new $url[0];

        //             if(isset($url[1])){
        //                 if(isset($url[2])){
        //                     if(method_exists($controlador->{$url[1]}, $url[2]))
        //                         $controlador->{$url[1]}($url[2]);
                            
        //                 }
        //             }

        //         }
        //         else{
        //             $controlador = new _error();
        //         }
        //     }
        // }
        
        else{
            require_once 'controllers/main.php';
            $controlador = new main();
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