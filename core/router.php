<?php
require_once 'core/controller.php';
require_once 'core/view.php';
require_once 'core/model.php';
require_once 'core/db.php';


define('URL', '/proyectoISW/');

class Router{
    static function get($URL){

        if(isset($URL[0]) && $URL[0]){
            if($URL[0] == "418"){
                $controlador= new _error(418);
                return;
            }

            $archivoControlador = self::getControllerPath($URL);
            if(file_exists($archivoControlador)){
                require_once $archivoControlador;
                $controlador= new $URL[0];
                $controlador->setModel($URL[0]);
                // self::prepareModule($controlador);
                
                if(isset($URL[1])){
                    // echo "<p>$archivoControlador/$URL[1]/$URL[2]</p>"; 
                    if(method_exists($controlador, $URL[1])){
                        if(isset($URL[2]))
                            $controlador->{$URL[1]}($URL[2]);
                        else $controlador->{$URL[1]}();
                    }
                    else{
                        $controlador = new _error(400);
                        return;
                    }
                }
                self::prepareModule($controlador);
            }
            else $controlador = new _error(404);
        }
    }
    
    static function getControllerPath($controller){
        return "controllers/$controller[0].php";
    }
    static function prepareModule($module){
        $module->render();
    }
}

?>