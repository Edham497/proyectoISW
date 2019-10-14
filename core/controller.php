<?php 

class Controller{
    function __construct(){
        // echo "<p>controller</p>";
        
        //Cada que se cree un controlador se creara su vista asociada
        $this->view = new View();
    }

    function setModel($model){
        $url = 'models/'.$model.'model.php';
        if(file_exists($url)){
            require_once $url;

            $modelName = $model.'model';
            $this->model = new $modelName();
        }
    }
}

?>