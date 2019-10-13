<?php

class Ayuda extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->render('ayuda/index');
    }

    function FAQ(){
        echo "<h1>FAQ</h1>";
    }
}

?>