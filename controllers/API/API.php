<?php
    class API{
        function __construct($URL){
            $this->db = new Database();
            $route = strtolower($_GET['url']);
            switch($route){
                case 'api/users/list': $this->getUsers(); break;
                case 'api/users/add': $this->addUser(); break;
                default: echo json_encode('Bad request'); break;
            }
        }

        function getUsers(){
            $stmt = $this->db->getConn();
            $query = "SELECT * FROM usuarios";
            // echo $query;
            $stmt = $stmt->prepare($query);
            $stmt->execute();
            $stmt = $stmt->fetch(PDO::FETCH_OBJ);
            echo json_encode($stmt);
        }

        function addUser(){
            if(isset($_POST['usrname'])){
                $stmt = $this->db->getConn();

                $query = "INSERT INTO usuarios (usrname, rol, pass) VALUES (:usrname, :rol, 'undefined')";
                
                $stmt = $stmt->prepare($query);
                $stmt->bindParam(':usrname', $_POST['usrname']);
                $stmt->bindParam(':rol', $_POST['rol']);
                $stmt->execute();
                
                echo json_encode('Usuario insertado Correctamente');
            }
        }
    }
?>