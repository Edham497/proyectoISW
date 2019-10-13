<?php

require_once 'lib/controller.php';
require_once 'lib/view.php';
require_once 'lib/model.php';

define('URL', '/proyectoISW/');

class Router{
    static function get($URL){
        if(isset($URL[0]) && $URL[0]){
            $archivoControlador = self::getControllerPath($URL);

            if(file_exists($archivoControlador)){
                require_once $archivoControlador;
                $controlador= new $URL[0];

                if(isset($URL[1])){
                    if(isset($URL[2])){
                        echo "<p>$archivoControlador/$URL[1]/$URL[2]</p>"; //=> 
                        if(method_exists($controlador, $URL[1])){
                            if(isset($URL[2])){
                                $controlador->{$URL[1]}($URL[2]);
                            }else $controlador->{$URL[1]}();
                        }
                        else $controlador = new _error();
                    }
                
                }

            }
            else{
                $controlador = new _error();
            }
        }
    }
    
    static function getControllerPath($controller){
        return "controllers/$controller[0].php";
    }
}

?>