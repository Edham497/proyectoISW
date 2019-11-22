<?php
<<<<<<< HEAD
    class _Maestro{
        function list(){
=======
    class _Alumnos{
        
        function __construct($URL){
            
        }
        //ADMIN
        function Registro(){
>>>>>>> master
            try{
                $stmt = $this->db->getConn();
                $query = "SELECT * FROM Niño";
                $stmt = $stmt->query($query);
                $stmt->execute();    
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
?>