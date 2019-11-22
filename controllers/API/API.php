<?php
    class API{
        function __construct($URL){
            $nameAPI = "_$URL[1]";
            if(file_exists(self::getApiPath($nameAPI))){
                require_once self::getApiPath($nameAPI);
                $classAPI = new $nameAPI;
                if(isset($URL[2]) && method_exists($classAPI, $URL[2]))
                    $classAPI->{$URL[2]}(isset($URL[3])?$URL[3]:'');
                else new _error(400);
            }
            
        }

        private static function getApiPath($nameAPI){
            return "controllers/api/$nameAPI.php";
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