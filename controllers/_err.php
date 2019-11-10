<?php 

class _error extends Controller{
    function __construct($code){
        parent::__construct();
        //Variables que se modificaran en la vista
        $this->view->error_code = $code;
        $this->view->error_name = self::getErrorName($code);
        $this->view->error_desc = self::getErrorDescription($code);
        $this->view->render("_err/index");
    }

    function getErrorDescription($id){
        switch($id){
            case 400: return "El servidor no puede procesar la solicitud.";break;
            case 401: return "La solicitud no se ejecutara hasta iniciar una sesión.";break;
            case 403: return "No se tiene los permisos para acceder a esta seccion"; break;    
            case 404: return "El servidor no ha podido encontrar el recurso solicitado.";break;
            case 418: return "El servidor HTCPCP es una tetera, la elaboracion de café no es compatible con este tipo de servidor."; break;
        }
    }
    function getErrorName($id){
        switch($id){
            case 400: return "Bad Request"; break;
            case 401: return "Unauthorized";break;
            case 403: return "Forbidden"; break;    
            case 404: return "Not Found";break;
            case 418: return "I'm a teapot"; break;
        }
    }
}

?>