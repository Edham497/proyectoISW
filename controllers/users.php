<?php

class Users extends Controller{

    function __construct(){
        parent::__construct();
        $this->renderFile = 'users/list';
        $this->view->empleados = "";
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
}