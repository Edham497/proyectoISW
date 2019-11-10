<?php

class signup_model extends Model{
    public function __construct(){
        parent::__construct();
        //echo "OwO";
    }

    public function insertUser($nom,$apPat,$apMat,$email,$pass,$telefono,$rol){     
        $conn = $this->db->getConn();
        $passR = password_hash($pass, PASSWORD_DEFAULT);
        $query = "INSERT INTO Adulto (nomAdulto,apPatAdulto,apMatAdulto,email,contra,rolAdulto,telefono)
        values('".$nom."','".$apPat."','".$apMat."','".$email."','".$passR."',".$rol.",'".$telefono."');";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    }
}

?>