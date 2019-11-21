<?php
    class _Alumnos{
        
        function __construct($URL){
            
        }
        //ADMIN
        function Registro(){
            try{
                $stmt = $this->db->getConn();
                $query = "INSERT INTO Niño (nomNiño,apPatNiño,apMatNiño,fecNacimiento,direccion)
                VALUES ('".$_POST['nomNiño']."','".$_POST['apPatNiño']."','".$_POST['apMatNiño']."',
                '".$_POST['fecNacimiento']."'  ,'".$_POST['direccion']."')";
                $stmt = $stmt->query($query);
                $stmt->execute();    
            }catch(PDOException $pdo_err){
                echo json_encode(["error"=>[
                    "code" => $pdo_err->getCode(),
                    "msg" => $pdo_err->getMessage()
                ]]);
            }
        }
        //MAESTRO
        function Entrada(){
            try{
                $stmt = $this->db->getConn();
                $query = "UPDATE Maestro_Niño SET fechaEntrada = NOW(), idMaestrofk = ".$_SESSION['id'].",idNiñofk = ".$_POST['Nino'].";";
                $stmt = $stmt->query($query);
                $stmt->execute();    
            }catch(PDOException $pdo_err){
                echo json_encode(["error"=>[
                    "code" => $pdo_err->getCode(),
                    "msg" => $pdo_err->getMessage()
                ]]);
            }
        }

        function Salida(){
            try{
                $stmt = $this->db->getConn();
                $query = "UPDATE Maestro_Niño SET fechaSalida = NOW(), idAdultoSalidafk = ".$_POST['Tutor']." WHERE idNiñofk = ".$_POST['Nino'].";";
                $stmt = $stmt->query($query);
                $stmt->execute();    
            }catch(PDOException $pdo_err){
                echo json_encode(["error"=>[
                    "code" => $pdo_err->getCode(),
                    "msg" => $pdo_err->getMessage()
                ]]);
            }
        }

        function Bitacora(){
            try{
                $stmt = $this->db->getConn();
                $query = "INSERT INTO Bitacora (idAdultofk, idNiñofk, comida, anotaciones) 
                VALUES (".$_SESSION['id'].",.".$_POST['Nino'].",'".$_POST['comida']."','".$_POST['anotaciones']."')";
                $stmt = $stmt->query($query);
                $stmt->execute();    
            }catch(PDOException $pdo_err){
                echo json_encode(["error"=>[
                    "code" => $pdo_err->getCode(),
                    "msg" => $pdo_err->getMessage()
                ]]);
            }
        }

        function listarAlumnnos(){
            try{
                $stmt = $this->db->getConn();
                $query = "SELECT nomNiño,apPatNiño,apMatNiño,asistencia FROM Niño";
                $stmt = $stmt->query($query);
                $stmt->execute();
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
    }
?>