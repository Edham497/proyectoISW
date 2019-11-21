<?php
    class APIAlumnos{
        
        function __construct($URL){
            $this->db = new Database();
    
            if(isset($URL[2]) && method_exists($this, $URL[2]))
                $this->{$URL[2]}(isset($URL[3])?$URL[3]:'');
            else throw new _error(400);
        }

        function listarAlumnnos(){
            try{
                $stmt = $this->db->getConn();
                $query = "SELECT nomNiño,apPatNiño,apMatNiño,grado,comida,anotaciones,asistencia 
                FROM Niño JOIN Tutor_Niño ON idNiño = idNiñofk JOIN Adulto ON 
                Adulto.idAdulto = Tutor_Niño.idAdultofk JOIN Bitacora WHERE idAdulto = ".$_POST['id'].";";
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