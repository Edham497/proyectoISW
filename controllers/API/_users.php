<?php
require_once 'core/db.php';

class _users{
    function __construct(){
        $this->db = new Database();
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