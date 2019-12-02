<?php
require_once 'core/db.php';
class _admin{
    function __construct(){
        $this->db = new Database();
        $this->db = $this->db->getConn();
        // Obtiene la informacion de la peticion
        $this->json = file_get_contents('php://input');
        // Convierte el JSON a un Objeto de PHP
        $this->data = json_decode($this->json);
    }

    //LISTADO DE TODOS LOS NIÑOS
    function listKids(){
        $query = "SELECT idNiño as id, nomNiño as nom, apPNiño as app, apMNiño as apm, fecNNiño as fn, grupofk as grupo, imgNiño as imgn, activo FROM Niño WHERE activo =  true;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);
        echo json_encode($stmt);
    }

    function nAlumnos(){
        $query = "SELECT COUNT(*) total FROM Niño;";
        $stmt = $this->db->query($query);
        $n = $stmt->fetch(PDO::FETCH_OBJ);
        echo json_encode($n);
    }
    
    function nUsuarios(){
        $query = "SELECT COUNT(*) total FROM Usuario;";
        $stmt = $this->db->query($query);
        $n = $stmt->fetch(PDO::FETCH_OBJ);
        echo json_encode($n);
    }

    function nMaestros(){
        $query = "SELECT COUNT(*) total FROM Usuario WHERE rol = 3;";
        $stmt = $this->db->query($query);
        $n = $stmt->fetch(PDO::FETCH_OBJ);
        echo json_encode($n);
    }

    function nPediatras(){
        $query = "SELECT COUNT(*) total FROM Usuario WHERE rol = 4;";
        $stmt = $this->db->query($query);
        $n = $stmt->fetch(PDO::FETCH_OBJ);
        echo json_encode($n);
    }

    function nTutores(){
        $query = "SELECT COUNT(*) total FROM Usuario WHERE rol = 5;";
        $stmt = $this->db->query($query);
        $n = $stmt->fetch(PDO::FETCH_OBJ);
        echo json_encode($n);
    }
    
    function totales(){
        $query = "SELECT 
                    (SELECT COUNT(*) FROM Niño) as niños, 
                    (SELECT COUNT(*) FROM Usuario) as usuarios,
                    (SELECT COUNT(*) FROM Usuario WHERE rol = 3) as maestros, 
                    (SELECT COUNT(*) FROM Usuario WHERE rol = 4) as pediatras, 
                    (SELECT COUNT(*) FROM Usuario WHERE rol = 5) as tutores, 
                    (SELECT COUNT(*) FROM Usuario WHERE rol = 6) as autorizados;";
        $stmt = $this->db->query($query);
        $n = $stmt->fetch(PDO::FETCH_OBJ);
        echo json_encode($n);
    }

    function inscribir(){
        try{
            //Niño
            $query = "INSERT INTO Niño (nomNiño, apPNiño, apMNiño, fecNNiño, grupofk, activo) VALUES 
                        (:nom, :app, :apm, :fnac, :grupo, 1)";
            $stmt = $this->db->prepare($query);
            $stmt->execute(json_decode(json_encode($this->data->info_niño), true));

            //Tutor
            // $query = "INSERT INTO Usuario ( nomUsuario, apPUsuario, apMUsuario, fecNUsuario, email, pass, direccion, telefono, rol, imgUsuario, activo) VALUES 
            //             (:nom, :app, :apm, :fnac, :email, :pass, :dir, :tel, 5, '', 1)";
            // $stmt = $this->db->prepare($query);
            // $this->data->info_tutor['pass'] = password_hash($this->data->info_tutor['pass'],PASSWORD_DEFAULT);
            // $stmt->execute(json_decode(json_encode($this->data->info_tutor), true));

            // var_dump($this->data->info_niño);
            echo json_encode(['success' => 'Dato insertado correctamente']);
        }
        catch(PDOException $e){
            echo json_encode(['error' => $e.getMessage()]);
        }
    }
}

?>