<?php 

include("../connection/connection.php");
include("../include/typeAdmin.php");

$pdo = new Conexion();

session_start();

if (!isset($_SESSION['usuarioId'])) {
    header('location: index.php');
}

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

function input_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



    $sql = "INSERT INTO inspecciones (Fecha_inspeccion, Actividad, Area, idDelegado_del_area, idInspector, Pertenece_idPertenece, Turno) VALUES (:fechaInspeccion,:actividad,:idArea, :idDelegado, :idInspector, :idPertenece,:turno)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fechaInspeccion',$fecha_inspeccion);
    $stmt->bindValue(':actividad',$descripcionInspeccion);
    $stmt->bindValue(':idArea',$area);
    $stmt->bindValue(':idDelegado',$delegado);
    $stmt->bindValue(':idInspector',$inspector);
    $stmt->bindValue(':idPertenece',$responsable);
    $stmt->bindValue(':turno',$turno);

    $stmt->execute();

 

    exit;

/* INSERT INTO inspecciones 
(Fecha_inspeccion, Actividad, Area, idDelegado_del_area, idInspector, Pertenece_idPertenece, Turno)
 VALUES (FechaInsp, Actividad, idArea, idDelegado, idInspector, idPertenece) */

 
   /*if($stmt->execute()) {
        flash_message('success','Creada la inspeccion con exitos');v
        header('Location: hallazgo.php');
    } else {
        flash_message('error','Hubo un error al crear la inspeccion');
    }


    
    function flash_message($type, $message) {
        $_SESSION['message'] = array('type' => $type, 'message' => $message);
    }

    
    if(isset($_SESSION['message'])) {
        printf("<div class='message %s'>%s</div>", $_SESSION['message']['type'],
        $_SESSION['message']['message']);
        unset($_SESSION['message']);
    }*/





?>