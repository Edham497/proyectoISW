<?php

class Ayuda extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->render('ayuda/index');
    }

    function FAQ(){
        $args = func_get_args();
        echo "<h1>FAQ</h1><br><h1>".var_dump($args)."</h1>";
    }
}

?>