<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App();

$app->get('/usuarios', function (Request $request, Response $response) {
    // $this->logger->addInfo('Ticket list');
    // $mapper = new TicketMapper($this->db);
    // $tickets = $mapper->getTickets();
    // $sql = "SELECT * FROM usuarios";

    // // try{
    //     // $db = new Database();
    //     // $db = $db->conectarBD();
    //     // $result = $db->query($sql);
    //     $response = $this->view->render($response, 'usuarios.phtml');
    //     return $response;
    // }
    // catch(PDOException $pdo_err){
    //     echo '{error: {"text": ' . $pdo_err->getMessage() .'}';
    // }
    $response->write('Usuarios');
});

$app->get('/api/usuarios', function (Request $req, Response $res, array $args) {
    // echo "Obtener Usuarios";
    $sql = "SELECT * FROM usuarios";
    try{
        $db = new Database();
        $db = $db->conectarBD();
        $result = $db->query($sql);
        if($result->rowCount() > 0){
            $users = $result->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($users);
        }else{
            echo json_encode('No existen Usuarios en DB');
        }
    }catch(PDOException $pdo_err){
        echo '{error: {"text": ' . $pdo_err->   getMessage().'}';
    }
});

$app->post('/api/usuarios/nuevo', function (Request $req, Response $res, array $args) {
    // echo "Nuevo Usuario";
    $usrname = $req->getParam('usrname');
    $rol = $req->getParam('rol');

    $query = "INSERT INTO usuarios (usrname, rol, pass) VALUES ('$usrname', $rol, 'undefined')";
    
    try{
        $db = new Database();
        $db = $db->conectarBD();
        $result = $db->prepare($query);
        $result->execute();
        echo json_encode('Usuario insertado correctamente');
        
    }catch(PDOException $pdo_err){
        echo '{error: {"text": ' . $pdo_err->   getMessage().'}';
    }
});

$app->delete('/api/usuarios/delete', function (Request $req, Response $res, array $args) {
    // echo "Nuevo Usuario";

    $query = "DELETE FROM usuarios";
    
    try{
        $db = new Database();
        $db = $db->conectarBD();
        $result = $db->prepare($query);
        $result->execute();
        echo json_encode('Usuarios eliminados correctamente');
        
    }catch(PDOException $pdo_err){
        echo '{error: {"text": ' . $pdo_err->   getMessage().'}';
    }
});

