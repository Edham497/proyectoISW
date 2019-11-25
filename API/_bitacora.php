<?php
require_once '../core/db.php';

// Obtiene la informacion de la peticion
$json = file_get_contents('php://input');
// Convierte el JSON a un Objeto de PHP
$data = json_decode($json);
//HACER BITACORA
function doBit($idN, $idM,$comida,$durmio,$comp,$reporte){
    $db = new Database();
    $conn = $db->getConn();
    $query = "INSERT INTO Bitacora (idNiñofk, idMaestro, comida, durmio, comportaminto, reporte,fecBita) VALUES ($idN, $idM,'$comida',$durmio,$comp,'$reporte',NOW());";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    json_encode("BITACORA HECHA CON EXITO!");
}
//VER BITACORA DE LOS NIÑOS DEL TUTOR
function doBit($id){
    $db = new Database();
    $conn = $db->getConn();
    $query = "SELECT comida,durmio,comportaminto,reporte,fecBita FROM Bitacora WHERE fecBita = CURDATE() AND idNiñofk IN (SELECT idNiñofk from TutAut_Niño where idTutor = $id);";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    json_encode($stmt);
}

?>