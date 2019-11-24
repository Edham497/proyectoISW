<?php
// Obtiene la informacion de la peticion
$json = file_get_contents('php://input');
// Convierte el JSON a un Objeto de PHP
$data = json_decode($json);

if($data->usr && $data->pass){
    echo json_encode(["success" => "data is ok"]);
}
else{
    echo json_encode(["error" => "missing field"]);
}
?>