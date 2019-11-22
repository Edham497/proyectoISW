<?php 

class login_model extends Model{
    public function __construct(){
        parent::__construct();
        //echo "OwO";
    }

    public function checkUser($user, $pass){
        $conn = $this->db->getConn();
        $query = "SELECT nomAdulto, rolAdulto, contra FROM Adulto WHERE email = '" .$user ."';";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt = $stmt->fetch(PDO::FETCH_ASSOC);
        return password_verify($pass, $stmt['contra'])?$stmt:null;
    }
}

?>