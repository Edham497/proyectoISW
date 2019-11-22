<?php
    class Admin{
        function Inscripcion(){
            // Obtiene la informacion de la peticion
            $json = file_get_contents('php://input');
            // Convierte el JSON a un Objeto de PHP
            $data = json_decode($json);
            if($data->usrname){
                try{
                    //INSERTAR NIÑO
                    $stmt = $this->db->getConn();
                    $query = "INSERT INTO Niño (nomNiño,apPatNiño,apMatNiño,fecNacimiento,direccion)
                    VALUES ('".$_POST['nomNiño']."','".$_POST['apPatNiño']."','".$_POST['apMatNiño']."',
                    '".$_POST['anio']."-".$_POST['mes']."-".$_POST['dia']."','".$_POST['direccion']."')";
                    $stmt = $stmt->query($query);
                    $stmt->execute();
                    //INSERTAR TUTOR  
                    $passR = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                    $stmt = $this->db->getConn();
                    $query = "INSERT INTO Adulto (nomAdulto,apPatAdulto,apMatAdulto,email,contra,rolAdulto,telefono)
                    values ('".$_POST['nomTut']."','".$_POST['apPatTut']."','".$_POST['apMatTut']."','".$_POST['email']."',
                    '".$passR."',4,'".$_POST['telefono']."');";
                    $stmt = $stmt->query($query);
                    $stmt->execute();  
                    //INSERTAR AUTORIZADO 1
                    $stmt = $this->db->getConn();
                    $query = "INSERT INTO Adulto (nomAdulto,apPatAdulto,apMatAdulto,rolAdulto,telefono)
                    values ('".$_POST['nomAut1']."','".$_POST['apPatAut1']."','".$_POST['apMatAut1']."',5,'".$_POST['telefonoAut1']."');";
                    //INSERTAR AUTORIZADO 2
                    $stmt = $this->db->getConn();
                    $query = "INSERT INTO Adulto (nomAdulto,apPatAdulto,apMatAdulto,rolAdulto,telefono)
                    values ('".$_POST['nomAut2']."','".$_POST['apPatAut2']."','".$_POST['apMatAut2']."',5,'".$_POST['telefonoAut2']."');";
                    $stmt = $stmt->query($query);
                    $stmt->execute();
                }catch(PDOException $pdo_err){
                    echo json_encode(["error"=>[
                        "code" => $pdo_err->getCode(),
                        "msg" => $pdo_err->getMessage()
                    ]]);
                }
                header('Location:' . constant('URL'));
            }
        }        
        function updateAdulto(){
            try{
                $stmt = $this->db->getConn();
                $passR = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                $query = "UPDATE Adulto SET nomAdulto='".$_POST['nomTut']."',apPatAdulto='
                ".$_POST['apPatTut']."',apMatAdulto='".$_POST['apMatTut']."',email='".$_POST['email'].
                "',contra='$passR',rolAdulto=4,telefono='".$_POST['telefono']."' WHERE ".$_POST['id'].";";
                $stmt = $stmt->prepare($query);
                $stmt = $stmt->execute();
                echo json_encode(["res" => "Usuario eliminado"]);
            }
            catch(PDOException $pdo_err){
                echo json_encode(["error"=>[
                    "code" => $pdo_err->getCode(),
                    "msg" => $pdo_err->getMessage()
                ]]);
            }
        }
        function remove(){
            try{
                $stmt = $this->db->getConn();
                $query = "UPDATE Adulto SET rolAdulto = 0 WHERE idAdulto = ".$_POST['id'].";";
                // $query = "DELETE FROM usuarios WHERE id = $id";
                $stmt = $stmt->prepare($query);
                $stmt = $stmt->execute();
                echo json_encode(["res" => "Usuario eliminado"]);
            }
            catch(PDOException $pdo_err){
                echo json_encode(["error"=>[
                    "code" => $pdo_err->getCode(),
                    "msg" => $pdo_err->getMessage()
                ]]);
            }
        }
    }
?>