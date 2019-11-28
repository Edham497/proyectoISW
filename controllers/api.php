<?php 

require_once 'core/_err.php';

class API{
    function __construct($URL){
        if(Router::isLoged()){
            if(isset($URL[1])){
                $nameAPI = "_$URL[1]";
                if(file_exists(self::getApiPath($nameAPI))){
                    require_once self::getApiPath($nameAPI);
                    $classAPI = new $nameAPI;
                    //si hayun metodoo que exista lo llamamos
                    if(isset($URL[2]) && method_exists($classAPI, $URL[2])){
                        //al mismo tiempo, si hay un argumento lo llamamos
                        $classAPI->{$URL[2]}(isset($URL[3])?$URL[3]:'');
                    }
                }
                else new _error(400);
            }
            else new _error(400);
        }
        else new _error(403);
    }
    
    private static function getApiPath($nameAPI){
        return "controllers/api/$nameAPI.php";
    }
}
?>