<?php 

class Controller{
    function __construct(){
        // echo "<p>controller</p>";
        
        //Cada que se cree un controlador se creara su vista asociada
        $this->view = new View();
    }
}

?>