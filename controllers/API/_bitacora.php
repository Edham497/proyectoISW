<?php
    class _Bitacora{
        
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
    }
?>