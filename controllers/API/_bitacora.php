<?php
require_once 'core/db.php';

class _bitacora{
    function __construct(){
        $this->db = new Database();
        // Obtiene la informacion de la peticion
        $this->json = file_get_contents('php://input');
        // Convierte el JSON a un Objeto de PHP
        $this->data = json_decode($this->json);
    }
        //HACER BITACORA
        function doBit(){
            $conn = $this->db->getConn();
            $query = "INSERT INTO Bitacora (idNiñofk, idMaestro, reporte,fecBita) VALUES (".$this->data->idN.", ".$this->data->idM.",'".$this->data->rep."',NOW());";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            echo json_encode("BITACORA HECHA CON EXITO!");
        }
        //VER BITACORA DE LOS NIÑOS DEL TUTOR
        function seeBit($id,$fec){
            $db = new Database();
            $conn = $db->getConn();
            $query = "SELECT nomNiño,comida,durmio,comportaminto,reporte,fecBita FROM Bitacora JOIN TutAut_niño ON idTutor = $id JOIN Niño ON idNiño = TutAut_Niño.idNiñofk WHERE fecBita = '$fec';";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($stmt);
        }
        function listBits($id){
            $db = new Database();
            $conn = $db->getConn();
            $query = "SELECT nomNiño,comida,durmio,comportaminto,reporte,fecBita FROM Bitacora JOIN TutAut_niño ON idTutor = $id ;";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($stmt);
        }
        
}
?>