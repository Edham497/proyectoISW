<?php

class Ayuda extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->render('ayuda/index');
    }

    function FAQ(){
        echo "<p>" . var_dump(func_get_args()) . "</p>";
    }
}

?>