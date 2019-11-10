<?php
class Main extends Controller{
    function __construct(){
        parent::__construct();
        $this->renderFile = 'main/index';
    }
    function render(){
        $this->view->render($this->renderFile);
    }

    function instalaciones(){
        $this->renderFile = 'main/instalaciones';
    }
}
?>