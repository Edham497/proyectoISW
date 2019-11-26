<?php
require_once 'core/db.php';
class _user{
    function __construct(){
        // Obtiene la informacion de la peticion
        $json = file_get_contents('php://input');
        // Convierte el JSON a un Objeto de PHP
        $data = json_decode($json);
        //VER TODOS LOS USUARIOS
        function listUsers(){
            $db = new Database();
            $conn = $db->getConn();
            $query = "SELECT nomUsuario, apPUsuario,apMUsuario,email,direccion,rol,imgUsuario FROM Usuario WHERE rol > 1 AND activo = true;";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($stmt);
        }
        //INSERTAR TUTORES
        function insertUser($nom,$apP,$apM,$fec,$email,$pass,$dir,$tel,$rol){
            $db = new Database();
            $conn = $db->getConn();
            $passR = password_hash($pass,PASSWORD_DEFAULT);
            $query = "INSERT INTO Usuario ( nomUsuario, apPUsuario, apMUsuario, fecNUsuario, email, pass, direccion, telefono, rol, activo) VALUES ('$nom','$apP','$apM','$fec','$email','$passR','$dir','$tel',$rol,1);";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            echo json_encode("DATO INSETADO CORRECTAMENTE");
        }
        //INSERTAR AUTORIZADOS
        function insertUserAut($nom,$apP,$apM,$fec,$dir,$tel){
            $db = new Database();
            $conn = $db->getConn();
            $query = "INSERT INTO Usuario ( nomUsuario, apPUsuario, apMUsuario, fecNUsuario, direccion, telefono, rol, activo) VALUES ('$nom','$apP','$apM','$fec','$dir','$tel',6,1);";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            echo json_encode("DATO INSETADO CORRECTAMENTE");
        }
        //ACTUALIZAR USUARIO
        function updateUser($id,$nom,$apP,$apM,$fec,$email,$pass,$dir,$tel,$rol){
            $db = new Database();
            $conn = $db->getConn();
            $passR = password_hash($pass,PASSWORD_DEFAULT);
            $query = "UPDATE Usuario SET nomUsuario = '$nom', apPUsuario = '$apP', apMUsuario = '$apM', fecNUsuario = '$fec', email = '$email', pass = '$passR',direccion = '$dir', telefono = '$tel', rol = $rol WHERE idUsuario = $id;";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            echo json_encode("DATO ACTUALIZADO CORRECTAMENTE");
        }
        //DAR DE BAJA USUARIOS
        function deleteUser($id){
            $db = new Database();
            $conn = $db->getConn();
            $query = "UPDATE Usuario SET activo = false WHERE idUsuario = $id;";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            echo json_encode("DADO DE BAJA CORRECTAMENTE");
        }
        //LOS METODOS SE LA SUDABA, AGREGE UN ATRIBUTO LLAMADA "method" AL JSON PARA EL METODO
        switch($data->method){
            case "list":listUsers();break;
            case "insert": insertUser($data->nom,$data->apP,$data->apM,$data->fec,$data->email,$data->pass,$data->dir,$data->tel,$data->rol);break;
            case "insertAut": insertUserAut($data->nom,$data->apP,$data->apM,$data->fec,$data->dir,$data->tel);break;
            case "update": updateUser($data->id,$data->nom,$data->apP,$data->apM,$data->fec,$data->email,$data->pass,$data->dir,$data->tel,$data->rol);break;
            case "delete":deleteUser($data->id);break;
        }
    }
}   
?>