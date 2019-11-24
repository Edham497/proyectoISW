<?php
require_once '../core/db.php';


// Obtiene la informacion de la peticion
$json = file_get_contents('php://input');
// Convierte el JSON a un Objeto de PHP
$data = json_decode($json);

function checkUser($user, $pass){
    $db = new Database();
    $conn = $db->getConn();
    $query = "SELECT nomAdulto, rolAdulto, contra FROM Adulto WHERE email = '" .$user ."';";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
    session_start();
    if(password_verify($pass, $stmt['contra'])){
        $_SESSION['usr_name'] = $stmt['nomAdulto'];
        $_SESSION['rol'] = $stmt['rolAdulto'];
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
?>