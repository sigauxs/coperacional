<?php 

$fecha_inspeccion = $_POST['fechaInspeccion'];
$sede = $_POST['sede'];
$vp = $_POST['vp'];
$dpto = $_POST['dpto'];
$area = $_POST['area'];
$descripcionInspeccion = $_POST['descripcion'];
$inspector = $_POST['inspector'];


echo $fecha_inspeccion." - sede : ".$sede." -  vicepresidencia: ".$vp." - departamante: ".$dpto." - area: ".$area. " - descripcion:  ". $descripcionInspeccion." - inspector ".$inspector;






?>