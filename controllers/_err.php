<?php 

class _error extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->render("_err/index");

    }
}

?>