<?php
require_once '../core/db.php';

// Obtiene la informacion de la peticion
$json = file_get_contents('php://input');
// Convierte el JSON a un Objeto de PHP
$data = json_decode($json);

//LISTADO DE TODOS LOS NIÑOS
function listKids($user, $pass){
    $db = new Database();
    $conn = $db->getConn();
    $query = "SELECT nomNiño, apPNiño, apMNiño,fecNNiño,grupofk,imgNiño FROM Niño WHERE activo =  true;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);
    json_encode($stmt);
}
//LISTAR NIÑOS POR TUTOR
function listKidsTut($id){
    $db = new Database();
    $conn = $db->getConn();
    $query = "SELECT * FROM Niño WHERE idNiño in (SELECT idNiñofk FROM TutAut_Niño where idTutor = $id) AND activo = true;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);
    json_encode($stmt);
}
//INSERTAR NIÑOS
function insertKid($nom,$apP,$apM,$fec,$grupo){
    $db = new Database();
    $conn = $db->getConn();
    $passR = password_hash($pass,PASSWORD_DEFAULT);
    $query = "INSERT INTO Niño (nomNiño, apPNiño, apMNiño, fecNNiño, grupofk, activo) VALUES ('$nom','$apP','$apM','$fec','$grupo',1)";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    json_encode("DATO INSETADO CORRECTAMENTE");
}
//ACTUALIZAR INFO. DE NIÑOS
function updateKid($id,$nom,$apP,$apM,$fec,$grupo){
    $db = new Database();
    $conn = $db->getConn();
    $passR = password_hash($pass,PASSWORD_DEFAULT);
    $query = "UPDATE Niño SET nomNiño = '$nom', apPNiño = '$apP', apMNiño = '$apM', fecNNiño = '$fec', grupo = '$grupo' WHERE idNiño = $id;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    json_encode("DATO ACTUALIZADO CORRECTAMENTE");
}
//DAR DE BAJA A UN NIÑO
function deleteKid($id){
    $db = new Database();
    $conn = $db->getConn();
    $query = "UPDATE Niño SET activo = false WHERE idNiño = $id;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    json_encode("DADO DE BAJA CORRECTAMENTE");
}
//UNIR NIÑOS CON AUTORIZADOS Y TUTOR
function kidTutAut($idTut,$idNiño){
    $db = new Database();
    $conn = $db->getConn();
    $passR = password_hash($pass,PASSWORD_DEFAULT);
    $query = "INSERT INTO TutAut_Niño (idTutor, idNiñofk) VALUES ($idTut,$idNiño);";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    json_encode("DATO INSETADO CORRECTAMENTE");
}
//REGISTRAR ENTRADA
function entryKid($id){
    $db = new Database();
    $conn = $db->getConn();
    $query = "INSERT INTO Asistencia (idNiñofk,fecEntrada) VALUES ($id,NOW());";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    json_encode("ENTRADA CONFIRMADA")
}
//REGISTRAR SALIDA
function exitKid($id,$idPR,$idTutAut){
    $db = new Database();
    $conn = $db->getConn();
    $query = "UPDATE Asistencia SET fecSalida=NOW(), idPR = '$idPR', idTutAut = $idTutAut;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
}

?>