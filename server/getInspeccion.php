<?php

include("../connection/connection.php");
$pdo = new Conexion();

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Allow:  OPTIONS, GET ");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "OPTIONS") {
    die();
}

$idinspeccion = $_GET['idinspeccion'];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sql = "SELECT * FROM inspecciones WHERE idInspeccion = :idInspeccion";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':idInspeccion', $idinspeccion);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    var_dump(!$stmt->fetchAll());
    
    if(!$stmt->fetchAll()){
        echo "Hola mundo";
    }else{
        echo "esto tiene datos";
    }
header('HTTP/1.1 200 OK');
echo json_encode($stmt->fetchAll());

} else {
    echo json_encode("No hay datos para guardar");
}




/*
include("../connection/connection.php");
include("../include/typeAdmin.php");

$pdo = new Conexion();

session_start();

if (!isset($_SESSION['usuarioId'])) {
    header('location: index.php');
}


function input_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$idInspeccion = input_data($_POST['idInspeccion']);
$fecha_inspeccion = input_data($_POST['fechaInspeccion']);
$sede = input_data($_POST['sede']);
$vp = input_data($_POST['vp']);
$dpto = input_data($_POST['dpto']);
$area = input_data($_POST['area']);
$descripcionInspeccion =input_data($_POST['descripcion']);
$inspector = input_data($_POST['inspector']);
$turno = input_data($_POST['turno']);
$delegado = input_data($_POST['delegado']);
$responsable = input_data($_POST['responsable']);

if($_SERVER['REQUEST_METHOD']=='PUT'){
    
    $sql = "UPDATE inspecciones AS I
    SET I.Fecha_inspeccion = :fechaInspeccion, I.Actividad = :actividad, I.Area = :idArea, I.idDelegado_del_area = :idDelegado, I.Pertenece_idPertenece = :idPertenece, I.Turno = :turno
    WHERE I.idInspeccion = :idInspeccion";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':idInspeccion',$idInspeccion);
    $stmt->bindValue(':fechaInspeccion',$fecha_inspeccion);
    $stmt->bindValue(':actividad',$descripcionInspeccion);
    $stmt->bindValue(':idArea',$area);
    $stmt->bindValue(':idDelegado',$delegado);
    $stmt->bindValue(':idInspector',$inspector);
    $stmt->bindValue(':idPertenece',$responsable);
    $stmt->bindValue(':turno',$turno);

    if($stmt->execute()){
        header('HTTP/1.1 201 OK');
        echo json_encode("success");
    }else{
        header('HTTP/1.1 400 OK');
        echo json_encode("error");
    }
    

}else{
    echo json_encode("No hay datos para guardar");
}




*/
