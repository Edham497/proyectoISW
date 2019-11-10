<?php 

class login_model extends Model{
    public function __construct(){
        parent::__construct();
        //echo "OwO";
    }

    public function checkUser($user){
        $conn = $this->db->getConn();
        //$query = "SELECT nomAdulto, rolAdulto FROM Adulto WHERE email = '" .$user ."' AND contra = '".$pass."';";
        $query = "SELECT nomAdulto, rolAdulto,contra FROM Adulto WHERE email = '" .$user ."';";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>