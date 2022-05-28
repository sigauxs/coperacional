<?php

include("../connection/connection.php");
$pdo = new Conexion();


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods:OPTIONS,POST");
header("Allow: OPTIONS,POST");

$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}


/*if($_SERVER['REQUEST_METHOD']=='POST'){


}*/
$nombre = "AMorgan@drummondltd.com";
$edad = "77162256";


$sql = "CALL Usuario_Registrado(:nombre,:edad);";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':nombre',$nombre);
$stmt->bindValue(':edad',$edad);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

header('HTTP/1.1 200 OK');
echo json_encode($stmt->fetchAll());

?>