<?php
require_once 'core/db.php';

class _login{
    function __construct(){
        // Obtiene la informacion de la peticion
        $json = file_get_contents('php://input');
        // Convierte el JSON a un Objeto de PHP
        $data = json_decode($json);
        
        function checkUser($user, $pass){
            $db = new Database();
            $conn = $db->getConn();
            $query = "SELECT nomUsuario, rol, pass, imgUsuario FROM Usuario WHERE email = '" .$user ."';";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
            session_start();
            if(password_verify($pass, $stmt['pass'])){
                $_SESSION['usr_name'] = $stmt['nomUsuario'];
                $_SESSION['rol'] = $stmt['rol'];
                $_SESSION['rolName'] = 'undefined';
                $_SESSION['usr_img'] = $stmt['imgUsuario'];

                //Asignamos el nombre del rol para la barra de navegacion
                switch($_SESSION['rol']){
                    case 1: $_SESSION['rolName'] = 'Administrador'; break; 
                    case 2: $_SESSION['rolName'] = 'Recepcionista'; break; 
                    case 3: $_SESSION['rolName'] = 'Maestro'; break; 
                    case 4: $_SESSION['rolName'] = 'Pediatra'; break; 
                    case 5: $_SESSION['rolName'] = 'Tutor'; break; 
                }
                return true;
            }
            session_destroy();
            return false;
        }
        
        if(checkUser($data->usr, $data->pass)){
            echo json_encode(["success" => "Iniciando sesion..."]);
        }
        else{
            echo json_encode(["error" => "Usuario o Contraseña incorrectos"]);
        }
    }
}

?>