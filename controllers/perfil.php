<?php 
class perfil extends Controller{
    function __construct(){
        parent::__construct();
        session_start();
        // $this->view->name = $_SESSION['usr_name']; 
        $this->render();
    }
    function render(){
        $this->view->render('perfil/index');
    }
}
?>