<?php 

class Database{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    function __construct(){
        $this->host = "localhost";
        $this->db = "Guarderia";
        $this->user = "root";
        $this->password = "Hector_2807";
        $this->charset = "utf8mb4";
    }
    
    function getConn(){
        try{
            $connection = "mysql:host=$this->host; dbname=$this->db; charset=$this->charset;";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            return new PDO($connection, $this->user, $this->password, $options);   
        }
        catch(PDOException $e){
            print_r('Error connection' . $e->getMessage());
        }
    }
    
    function insert($query){
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }

    function select($type, $id){
        $stmt = $this->pdo->prepare("select * from " . $type . "where id = " . $id);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->execute();
    }

    function update($query){
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }

    function delete($query){
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }
}

?>