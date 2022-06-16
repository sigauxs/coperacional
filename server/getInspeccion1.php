<?php 

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

$idInspeccion = input_data($_GET['idInspeccion']);
$fecha_inspeccion = input_data($_GET['fechaInspeccion']);
$sede = input_data($_GET['sede']);
$vp = input_data($_GET['vp']);
$dpto = input_data($_GET['dpto']);
$area = input_data($_GET['area']);
$descripcionInspeccion =input_data($_GET['descripcion']);
$inspector = input_data($_GET['inspector']);
$turno = input_data($_GET['turno']);
$delegado = input_data($_GET['delegado']);
$responsable = input_data($_GET['responsable']);

if($_SERVER['REQUEST_METHOD']=='GET'){
    
    $sql = "UPDATE inspecciones AS I
    SET I.Fecha_inspeccion = :fechaInspeccion, I.Actividad = :actividad, I.Area = :idArea, I.idDelegado_del_area = :idDelegado, I.Pertenece_idPertenece = :idPertenece, I.Turno = :turno
    WHERE I.idInspeccion = ID_INSPECCION";
    $stmt = $pdo->prepare($sql);
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






?>