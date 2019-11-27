<?php
require_once 'core/db.php';

class _bitacora{
    function __construct(){
        // Obtiene la informacion de la peticion
        $this->json = file_get_contents('php://input');
        // Convierte el JSON a un Objeto de PHP
        $this->data = json_decode($this->json);
        //HACER BITACORA
        
        /*switch($data->method){
            case "do":doBit($data->idN, $data->idM,$data->comida,$data->durmio,$data->comp,$data->reporte);break;
            case "see":seeBit($data->id,$data->fec);break;
        }*/
    }    
    function doBit(){
        $db = new Database();
        $conn = $db->getConn();
        $query = "INSERT INTO Bitacora (idNiñofk, idMaestro, comida, durmio, comportaminto, reporte,fecBita) VALUES (".$this->data->idN.",".$this->data->idM.",'".$this->data->comida."',".$this->data->durmio.",".$this->data->comp.",'".$this->data->reporte."',NOW());";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        echo json_encode("BITACORA HECHA CON EXITO!");
    }
    //VER BITACORA DE LOS NIÑOS DEL TUTOR
    function seeBit(){
        $db = new Database();
        $conn = $db->getConn();
        $query = "SELECT nomNiño,comida,durmio,comportaminto,reporte,fecBita FROM Bitacora JOIN TutAut_niño ON idTutor = ".$this->data->id." JOIN Niño ON idNiño = TutAut_Niño.idNiñofk WHERE fecBita = '".$this->data->fec."';";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($stmt);
    }
}
?>