<<<<<<< HEAD
<?php
    class _Ninos{
        function remove(){
            try{
                $stmt = $this->db->getConn();
                $query = "UPDATE Niño SET grado = EXPULSADO WHERE idNiño = ".$_POST['id'].";";
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
    }
=======
<?php
    class _Ninos{
        function __construct(){
            $this->db = new Database();
        }
        function remove(){
            try{
                $stmt = $this->db->getConn();
                $query = "UPDATE Niño SET grado = EXPULSADO WHERE idNiño = ".$_POST['id'].";";
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

        function get($id){
            try{
                $stmt = $this->db->getConn();
                $query = "SELECT * FROM Niño WHERE idNiño = $id";
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

        function list(){
            try{
                $stmt = $this->db->getConn();
                
                $query = "SELECT * FROM Niño";
                // $query = "SELECT * FROM Maestro_Niño join Niño on idNiño = idNiñofk";
                //$query = "SELECT *,TIMESTAMPDIFF(HOUR,fechaEntrada,fechaSalida),TIMESTAMPDIFF(MINUTES,fechaEntrada,fechaSalida) FROM Maestro_Niño";
                // echo $query;
                $stmt = $stmt->query($query);
                if($stmt->rowCount() > 0){
                    $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($stmt);
                }else{
                    echo json_encode(["error" => "No existen niños registrados"]);
                }
            }catch(PDOException $pdo_err){
                echo json_encode(["error"=>[
                    "code" => $pdo_err->getCode(),
                    "msg" => $pdo_err->getMessage()
                ]]);
            }
        }

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
    }
>>>>>>> master
?>