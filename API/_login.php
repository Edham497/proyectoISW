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
            $query = "SELECT nomUsuario, rol, pass FROM Usuario WHERE email = '" .$user ."';";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
            session_start();
            if(password_verify($pass, $stmt['pass'])){
                $_SESSION['usr_name'] = $stmt['nomUsuario'];
                $_SESSION['rol'] = $stmt['rol'];
                return true;
            }
            session_destroy();
            return false;
        }
        
        if(checkUser($data->usr, $data->pass)){
            echo json_encode(["success" => "Iniciando sesion..."]);
        }
        else{
            echo json_encode(["error" => "missing field"]);
        }
    }
}

?>