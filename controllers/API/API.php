<?php
    class API{
        function __construct($URL){
            $this->db = new Database();

            
            if(isset($URL[2]) && method_exists($this, $URL[2]))
                $this->{$URL[2]}(isset($URL[3])?$URL[3]:'');
            else throw new _error(400);
        }

        function update(){
            try{
                $stmt = $this->db->getConn();
                $query = "UPDATE Maestro_Niño SET fechaSalida = NOW(), idAdultoSalidafk = 5 WHERE idNiñofk = 2;";
                //$query = "UPDATE Maestro_Niño SET fechaEntrada = NOW() WHERE idNiñofk = 2;";
                $stmt = $stmt->query($query);
                $stmt->execute();    
            }catch(PDOException $pdo_err){
                echo json_encode(["error"=>[
                    "code" => $pdo_err->getCode(),
                    "msg" => $pdo_err->getMessage()
                ]]);
            }
        }

        function list(){
            try{
                $stmt = $this->db->getConn();
                $query = "SELECT * FROM Maestro_Niño join Niño on idNiño = idNiñofk";
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

        function add(){
            // Obtiene la informacion de la peticion
            $json = file_get_contents('php://input');

            // Convierte el JSON a un Objeto de PHP
            $data = json_decode($json);
            
            if($data->usrname){
                try{
                    $stmt = $this->db->getConn();
                    $query = "INSERT INTO Adulto (nomAdulto,apPatAdulto,apMatAdulto,email,contra,rolAdulto,telefono)
                    values('".$nom."','".$apPat."','".$apMat."','".$email."','".$passR."',4,'".$telefono."');";
                    $stmt = $stmt->prepare($query);
                    $stmt->execute();
                    
                    echo json_encode('Usuario insertado Correctamente');
                }
                catch(PDOException $pdo_err){
                    echo json_encode(["error"=>[
                        "code" => $pdo_err->getCode(),
                        "msg" => $pdo_err->getMessage()
                    ]]);
                }
            }
        }

        function get($id){
            try{
                $stmt = $this->db->getConn();
                $query = "SELECT * FROM Niño WHERE nomNiño LIKE '$id%'";
                $stmt = $stmt->query($query);
                $stmt = $stmt->fetch(PDO::FETCH_OBJ);
                if($stmt){
                    echo json_encode($stmt);
                }else{
                    echo json_encode(["Error" => "No existe el usuario con el id $id"]);
                }
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
                $query = "DELETE FROM usuarios";
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
        function describe(){
            try{
                $stmt = $this->db->getConn();
                $query = "DESCRIBE Maestro_Niño";
                $stmt = $stmt->query($query);
                $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);
                if($stmt){
                    echo json_encode($stmt);
                }else{
                    echo json_encode(["Error" => "No existe el usuario con el id $id"]);
                }
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