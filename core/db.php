<?php 

class Database{
    protected static $con;

    private function __construct(){
        try{
            self::$con = new PDO('mysql:charset=utf8mb4;host=localhost;port=3306;dbname=Guarderia','root', 'Hector_2807');
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conectado";
        }catch(PDOException $e){
            echo "No se ha podido acceder a la base de datos";
            exit;
        }
    }
    public static function getConn(){
        if(!self::$con)
            new Conexion();
        return self::$con;
    }
}

?>