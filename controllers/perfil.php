<?php 
class perfil extends Controller{
    function __construct(){
        parent::__construct();
        //Bloqueo de no autorizados
        Router::isLoged()?
            $this->render() : new _error(403);
    }
    function render(){
        $this->view->render('perfil/index');
    }
}
?>