<?php 

class API{
    function __construct($URL){
        $nameAPI = "_$URL[1]";
        if(file_exists(self::getApiPath($nameAPI))){
            require_once self::getApiPath($nameAPI);
            $classAPI = new $nameAPI;
            if(isset($URL[2]) && method_exists($classAPI, $URL[2]))
                $classAPI->{$URL[2]}(isset($URL[3])?$URL[3]:'');
            // else new _error(400);
        }
        
    }
    
    private static function getApiPath($nameAPI){
        return "api/$nameAPI.php";
    }
}
?>