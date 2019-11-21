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
?>