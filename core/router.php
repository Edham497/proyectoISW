<?php 

class Router{
    function __construct(){
        $URL = $this->getURLArray();
    }

    function getURLArray(){
        if(isset($_GET['url'])){
            $URL = $_GET['url'];            //Obtenemos la URL
            $URL = rtrim($URL, '/');        //elimina espacios en blanco
            $URL = explode('/', $URL);      //Convierte el string en un array, similar al split de java
            return $URL;
        }
    }

    
}