<?php
require_once 'core/db.php';

class _users{
    function __construct(){
        $this->db = new Database();
        $this->json = file_get_contents('php://input');
        $this->data = json_decode($this->json);
    }

    function list(){
        try{
            $stmt = $this->db->getConn();
            
            $query = "SELECT idUsuario, nomUsuario, apPUsuario, apMUsuario, fecNUsuario, email, direccion, telefono FROM usuario";
            // $query = "SELECT * FROM Maestro_Niño join Niño on idNiño = idNiñofk";
            //$query = "SELECT *,TIMESTAMPDIFF(HOUR,fechaEntrada,fechaSalida),TIMESTAMPDIFF(MINUTES,fechaEntrada,fechaSalida) FROM Maestro_Niño";
            // echo $query;
            $stmt = $stmt->query($query);
            if($stmt->rowCount() > 0){
                $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);
                echo json_encode($stmt);
            }else{
                echo json_encode(["error" => "No existen Usuarios en DB"]);
            }
        }catch(PDOException $pdo_err){
            echo json_encode(["error"=>[
                "code" => $pdo_err->getCode(),
                "msg" => $pdo_err->getMessage()
            ]]);
        }
    }
    
    function get($id){
        try{
            $stmt = $this->db->getConn();
            
            $query = "SELECT idUsuario, nomUsuario, apPUsuario, apMUsuario, fecNUsuario, email, direccion, telefono FROM usuario where idUsuario = $id";
            $stmt = $stmt->query($query);
            $stmt = $stmt->fetch(PDO::FETCH_OBJ);
            if($stmt){
                echo json_encode($stmt);
            }else{
                echo json_encode(["Error" => "No existe el usuario con el id $id"]);
            }
        }catch(PDOException $pdo_err){
            echo json_encode(["error"=>[
                "code" => $pdo_err->getCode(),
                "msg" => $pdo_err->getMessage()
            ]]);
        }

    }

    //INSERTAR AUTORIZADOS 
    function insertUser(){ 
        $db = new Database(); 
        $conn = $db->getConn(); 
        $passR = password_hash($this->data->pass,PASSWORD_DEFAULT); 
        $query = "INSERT INTO Usuario ( nomUsuario, apPUsuario, apMUsuario, fecNUsuario, email, pass, direccion, telefono, rol, activo) VALUES ('".$this->data->nom."','".$this->data->apP."','".$this->data->apM."','".$this->data->fec."','".$this->data->email."','$passR','".$this->data->dir."','".$this->data->tel."',".$this->data->rol.",1);"; 
        $stmt = $conn->prepare($query); 
        $stmt->execute(); 
        echo json_encode("DATO INSETADO CORRECTAMENTE"); 
    } 

    function insertUserAut(){ 
        $db = new Database(); 
        $conn = $db->getConn(); 
        $query = "INSERT INTO Usuario ( nomUsuario, apPUsuario, apMUsuario, fecNUsuario, direccion, telefono, rol, activo) VALUES ('".$this->data->nom."','".$this->data->apP."','".$this->data->apM."','".$this->data->fec."','".$this->data->dir."','".$this->data->tel."',6,1);"; 
        $stmt = $conn->prepare($query); 
        $stmt->execute(); 
        echo json_encode("DATO INSETADO CORRECTAMENTE"); 
    } 
    //ACTUALIZAR USUARIO 
    function updateUser(){ 
        $db = new Database(); 
        $conn = $db->getConn(); 
        $passR = password_hash($this->data->pass,PASSWORD_DEFAULT); 
        $query = "UPDATE Usuario SET nomUsuario = '".$this->data->nom."', apPUsuario = '".$this->data->apP."', apMUsuario = '".$this->data->apM."', fecNUsuario = '".$this->data->fec."', email = '".$this->data->email."', pass = '$passR',direccion = '".$this->data->dir."', telefono = '".$this->data->tel."' , rol = ".$this->data->rol." WHERE idUsuario = ".$this->data->id.";"; 
        $stmt = $conn->prepare($query); 
        $stmt->execute(); 
        echo json_encode("DATO ACTUALIZADO CORRECTAMENTE"); 
    } 
    function deleteUser(){ 
        $db = new Database(); 
        $conn = $db->getConn(); 
        $query = "UPDATE Usuario SET activo = false WHERE idUsuario = ".$this->data->id.";"; 
        $stmt = $conn->prepare($query); 
        $stmt->execute(); 
        echo json_encode("DADO DE BAJA CORRECTAMENTE"); 
    }
    // idUsuario,
    // nomUsuario,
    // apPUsuario,
    // apMUsuario,
    // fecNUsuario date,
    // email,
    // direccion,
    // telefono,
    // rol,
    // imgUsuario varchar(255),
    // activo boolean DEFAULT FALSE
}

?>
