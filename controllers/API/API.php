<?php
    class API{
        function __construct($URL){
            $this->db = new Database();

            if(method_exists($this, $URL[2]))
                $this->{$URL[2]}(isset($URL[3])?$URL[3]:'');
            

            // if(isset($URL[3])){
            //     $this->{$URL[2]}($URL[3]);
            // }else{
            //     $route = strtolower($_GET['url']);
            //     switch($route){
            //         case 'api/users/list': $this->getUsers(); break;
            //         case 'api/users/add': $this->addUser(); break;
            //         case 'api/users/delete': $this->deleteUser(); break;
            //         default: echo json_encode('Bad request'); break;
            //     }
            //     return;
            // }
        }

        function list(){
            try{
                $stmt = $this->db->getConn();
                $query = "SELECT * FROM usuarios";
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
    
                    $query = "INSERT INTO usuarios (usrname, rol, pass) VALUES (:usrname, :rol, 'undefined')";
                    
                    $stmt = $stmt->prepare($query);
                    $stmt->bindParam(':usrname', $data->usrname);
                    $stmt->bindParam(':rol', $data->rol);
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
                $query = "SELECT * FROM usuarios WHERE id = $id";
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
    }
?>