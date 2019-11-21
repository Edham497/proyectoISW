<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
class Users extends Controller{

    function __construct(){
        parent::__construct();
        $this->renderFile = 'users/list';
        $this->view->empleados = "";
        
        if(!self::isLoged()){
            $this->renderFile = '';
            new _error(401);
            return;
        }
    }

    function render(){
        if($this->renderFile == 'users/list')
            $this->view->empleados = $this->model->getUsers();
        $this->view->render($this->renderFile);
    }

    function add(){
        $this->renderFile = 'users/addUser';
    }

    function list(){
        echo "f";
    }

    function create(){
        if($_POST['usrname'] && $_POST['rol']){
            if($this->model->insertUser($_POST['usrname'], $_POST['rol'])){
                header('Location:' . constant('URL'). '/users');
            }
        }
    }

    function read(){ 
        $this->query = "select * from usuarios";
    }

    function update(){

    }

    function delete(){

    }
    function isLoged(){
        if(!session_status())
            session_start();
        return isset($_SESSION['usr_name']);
    }
}