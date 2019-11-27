<?php
require_once 'core/db.php';
class _kids{
    function __construct(){
<<<<<<< HEAD
        // Obtiene la informacion de la n
        $json = file_get_contents('php://input');
        // Convierte el JSON a un Objeto de PHP
        $data = json_decode($json);
        //LISTADO DE TODOS LOS NIÑOS
        function listKids(){
            $db = new Database();
            $conn = $db->getConn();
            $query = "SELECT nomNiño, apPNiño, apMNiño,fecNNiño,grupofk,imgNiño FROM Niño WHERE activo =  true;";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($stmt);
        }
        //LISTAR NIÑOS POR TUTOR
        function listKidsTut($id){
            $db = new Database();
            $conn = $db->getConn();
            $query = "SELECT * FROM Niño WHERE idNiño in (SELECT idNiñofk FROM TutAut_Niño where idTutor = :id);";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($stmt);
        }
        //INSERTAR NIÑOS
        function insertKid($nom,$apP,$apM,$fec,$grupo){
            $db = new Database();
            $conn = $db->getConn();
            $query = "INSERT INTO Niño (nomNiño, apPNiño, apMNiño, fecNNiño, grupofk, activo) VALUES ('$nom','$apP','$apM','$fec','$grupo',1)";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            json_encode("DATO INSETADO CORRECTAMENTE");
        }
        //ACTUALIZAR INFO. DE NIÑOS
        function updateKid($id,$nom,$apP,$apM,$fec,$grupo){
            $db = new Database();
            $conn = $db->getConn();
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
            json_encode("ENTRADA CONFIRMADA");
        }
        //REGISTRAR SALIDA
        function exitKid($idPR,$idTutAut){
            $db = new Database();
            $conn = $db->getConn();
            $query = "UPDATE Asistencia SET fecSalida=NOW(), idPR = '$idPR', idTutAut = $idTutAut;";
            $stmt = $conn->prepare($query);
            $stmt->execute();
        }
        
        /*LOS METODOS SE LA SUDABA, AGREGE UN ATRIBUTO LLAMADA "method" AL JSON PARA EL METODO
        switch($data->method){
            case "list":listKids();break;
=======
        $this->db = new Database();
        // Obtiene la informacion de la n
        $this->json = file_get_contents('php://input');
        // Convierte el JSON a un Objeto de PHP
        $this->data = json_decode($this->json);
    }
    //LISTADO DE TODOS LOS NIÑOS
    function listKids(){
        $conn = $this->db->getConn();
        $query = "SELECT idNiño, nomNiño, apPNiño, apMNiño,fecNNiño,grupofk,imgNiño FROM Niño WHERE activo =  true;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($stmt);
    }
    //GET NIÑO POR ID
    function getKid($id){
        $conn = $this->db->getConn();
        $query = "SELECT nomNiño, apPNiño, apMNiño,fecNNiño,grupofk,imgNiño FROM Niño WHERE idNiño =  $id;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt = $stmt->fetch(PDO::FETCH_OBJ);
        echo json_encode($stmt);
    }
    //LISTAR NIÑOS POR TUTOR
    function listKidsTut($id){
        $conn = $this->db->getConn();
        $query = "SELECT * FROM Niño WHERE idNiño in (SELECT idNiñofk FROM TutAut_Niño where idTutor = :id);";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id",$this->data->id);
        $stmt->execute();
        $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($stmt);
    }
    //INSERTAR NIÑOS
    function insertKid($nom,$apP,$apM,$fec,$grupo){
        $conn = $this->db->getConn();
        $query = "INSERT INTO Niño (nomNiño, apPNiño, apMNiño, fecNNiño, grupofk, activo) VALUES ('$nom','$apP','$apM','$fec','$grupo',1)";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        json_encode("DATO INSETADO CORRECTAMENTE");
    }
    //ACTUALIZAR INFO. DE NIÑOS
    function updateKid($id,$nom,$apP,$apM,$fec,$grupo){
        $conn = $this->db->getConn();
        $query = "UPDATE Niño SET nomNiño = '$nom', apPNiño = '$apP', apMNiño = '$apM', fecNNiño = '$fec', grupo = '$grupo' WHERE idNiño = $id;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        json_encode("DATO ACTUALIZADO CORRECTAMENTE");
    }
    //DAR DE BAJA A UN NIÑO
    function deleteKid($id){
        $conn = $this->db->getConn();
        $query = "UPDATE Niño SET activo = false WHERE idNiño = $id;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        json_encode("DADO DE BAJA CORRECTAMENTE");
    }
    //UNIR NIÑOS CON AUTORIZADOS Y TUTOR
    function kidTutAut($idTut,$idNiño){
        $conn = $this->db->getConn();
        $query = "INSERT INTO TutAut_Niño (idTutor, idNiñofk) VALUES ($idTut,$idNiño);";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        json_encode("DATO INSETADO CORRECTAMENTE");
    }
    //REGISTRAR ENTRADA
    function entryKid($id){
        $conn = $this->db->getConn();
        $query = "INSERT INTO Asistencia (idNiñofk,fecEntrada) VALUES ($id,NOW());";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        json_encode("ENTRADA CONFIRMADA");
    }
    //REGISTRAR SALIDA
    function exitKid($idPR,$idTutAut){
        $conn = $this->db->getConn();
        $query = "UPDATE Asistencia SET fecSalida=NOW(), idPR = '$idPR', idTutAut = $idTutAut;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    }
    
    /*LOS METODOS SE LA SUDABA, AGREGE UN ATRIBUTO LLAMADA "method" AL JSON PARA EL METODO
    switch($data->method){
        case "list":listKids();break;
>>>>>>> edham
            case "listByTut":listKidsTut($data->id);break;
            case "insert": insertKid($data->nom,$data->apP,$data->apM,$data->fec,$data->grupo);break;
            case "update": updateKid($data->id,$data->nom,$data->apP,$data->apM,$data->fec,$data->grupo);break;
            case "delete":deleteKid($data->id);break;
            case "kidTutAut":kidTutAut($data->idTut,$data->idNiño);break;
            case "entry": entryKid($data->id);break;
            case "exit":exitKid($data->idPR,$data->idTutAut);break;
        }*/
<<<<<<< HEAD
    }
}
=======
}

>>>>>>> edham
?>