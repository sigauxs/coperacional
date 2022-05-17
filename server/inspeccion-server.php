<?php 


$fecha_inspeccion = $_POST['fechaInspeccion'];
$date = strtotime($fecha_inspeccion);
echo date('d/m/Y',$date);

?>