<?php 

/*
$fecha_inspeccion = $_POST['fechaInspeccion'];
$date = strtotime($fecha_inspeccion);
echo date('d/m/Y',$date);*/

include("../connection/connection.php");
$pdo = new Conexion();


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, OPTIONS,POST");
header("Allow: GET, OPTIONS,POST");

$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}


if($_SERVER['REQUEST_METHOD']=='GET'){

        $idSede = $_GET['idSede'];
        
        if($idSede != ""){
            $sql = "SELECT idLocacion, NombreLocacion from locacion where idSede = :idSede";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':idSede',$idSede);
        }else {
            $sql = "SELECT idSede, NombreSede from sedes";
            $stmt = $pdo->prepare($sql);
        }
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        
        header('HTTP/1.1 200 OK');
        echo json_encode($stmt->fetchAll());
        
        




}




?>