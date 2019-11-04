<?php 

class Controller{
    function __construct(){
        //Cada que se cree un controlador se creara su vista asociada
        $this->renderFile = "";
        $this->view = new View();
    }

    function setModel($model){
        $url = 'models/'.$model.'_model.php';
        if(file_exists($url)){
            require_once $url;

            $modelName = $model.'_model';
            // echo "$model _model";
            $this->model = new $modelName();
        }
    }
}

?>