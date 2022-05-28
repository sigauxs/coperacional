<?php

include("../connection/connection.php");
$pdo = new Conexion();


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods:OPTIONS,POST,GET,DELETE");
header("Allow: POST,OPTIONS,PUT,DELETE");

$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}


if($_SERVER['REQUEST_METHOD']=='POST'){

    $jsonClient = json_decode(file_get_contents("php://input"));

    if(!$jsonClient){
        exit("No day datos para insertar");
    }

     $email = $jsonClient->email;
     $password = $jsonClient->password;
     
     $sql = "CALL Usuario_Registrado(:email,:password);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email',$email);
    $stmt->bindValue(':password',$password);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    header('HTTP/1.1 200 OK');
    echo json_encode($stmt->fetchAll());
     /*echo $email . " " .$password;*/


}
    /*
    if(!$jsonClient){
        exit("No day datos para insertar");
    }
    
    $sql = "CALL Usuario_Registrado(:email,:password);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email',$jsonClient->email);
    $stmt->bindValue(':password',$jsonClient->password);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    header('HTTP/1.1 200 OK');
    echo json_encode($stmt->fetchAll());

}
*/

/*
function validation_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }*/




?>