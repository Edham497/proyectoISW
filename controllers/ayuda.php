<?php

class Ayuda extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->FAQ_content = "";
    }
    
    function render(){
        $this->view->render('ayuda/index');
    }
    
    function FAQ(){
        $this->view->FAQ_content = "<p>FAQ</p>";
        // echo "<p>" . var_dump(func_get_args()) . "</p>";
        // $this->view->render('ayuda/index');
    }
}

?>