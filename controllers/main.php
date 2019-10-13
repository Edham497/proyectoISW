<?php
class Main extends Controller{
    function __construct(){
        parent::__construct();
        // echo "<p>Main Controller</p>";
        $this->view->render('main/index');
    }

    function f(){
        echo "<p>f</p>";
    }
}
?>