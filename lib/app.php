<?php

class App{
    function __construct(){

        if(isset($_GET['url'])){
            $url = $_GET['url'];            //Obtenemos la URL
            $url = rtrim($url, '/');        //elimina espacios en blanco
            $url = explode('/', $url);      //Convierte el string en un array, similar al split de java
        }

        if(isset($url[0]) && $url[0]){
            //Si $url[0] esta definida y tiene un valor
            $archivoControlador = 'controllers/'. $url[0] . '.php';
            // echo "<p>".$archivoControlador."</p>";

            if(file_exists($archivoControlador)){
                require_once $archivoControlador;
                $controlador = new $url[0];
                // echo "<p>$url[0]</p>";

                if(isset($url[1])){
                    if(isset($url[2]))
                        $controlador->{$url[1]}($url[2]);
                    else $controlador->{$url[1]}();
                }
            }else{
                // echo "<br>No existe esta ruta";
                require_once 'controllers/_err.php';
                $controlador = new _error();
            }
        }else{
            require_once 'controllers/main.php';
            $controlador = new main();
        }
    }
}

?>