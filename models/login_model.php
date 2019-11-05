<?php 

class login_model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function checkUser($user, $pass){
        $conn = $this->db->getConn();
        $query = "SELECT usrname, rol FROM usuarios WHERE usrname = '" .$user ."' AND pass = '$pass';";
        // echo $query;
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>