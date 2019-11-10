<?php 

class users_model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getUsers(){
        $conn = $this->db->getConn();
        $query = "SELECT * FROM usuarios";
        // echo $query;
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function insertUser($usrname, $rol){
        $conn = $this->db->getConn();
        $query = "INSERT INTO usuarios (usrname, rol, pass) VALUES ('$usrname', $rol, 'undefined')";
        // echo $query;
        $stmt = $conn->prepare($query);
        return $stmt->execute();
    }


}

?>