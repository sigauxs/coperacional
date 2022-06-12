<?php


require "./fpdf/fpdf.php";
require "./cabeceraypie.php";
require "conexion.php";

$sql = "Call ReporteHallazgos(11)";
$resultado = $mysqli->query($sql);

/*
$AltoCelda = 10;
$Ejex = 0;
$Ejey = 0;
$NumeroHallazgo = 0;
*/

$pdf = new PDF("P", "mm", "Letter");
$pdf -> AliasNbPages();
$pdf -> AddPage();
/*
$pdf -> AddFont('Tahoma', '', 'tahoma.php');
$pdf -> SetFont("Tahoma", "", 11);
*/
$pdf -> SetTextColor(61, 61, 60);
$pdf -> DatosH($sql, $resultado);

mysqli_close($mysqli);

/*
while($row = $resultado->fetch_assoc()){
	
	$NumeroHallazgo = $NumeroHallazgo + 1;
	$img = $row['EVIDENCIA'];
	
	$pdf -> Cell(200, $AltoCelda, 'HALLAZGO # '.$NumeroHallazgo, 0, 1, 'C', 0);
	
	//$pdf -> Cell(50, $AltoCelda, 'PELIGRO ASOCIADO:', 0, 0, 'L', 0);
	$pdf -> Cell(200, $AltoCelda, utf8_decode('PELIGRO ASOCIADO: '.$row['PELIGROS']), 0, 1, 'L', 0);
	
	//$pdf -> Cell(70, 10, utf8_decode('DESCRIPCIÓN DEL HALLAZGO:'), 0, 1, 'L', 0);
	//$pdf -> Cell(150, $AltoCelda, utf8_decode($row['DESCRIPCIÓN DEL HALLAZGO']), 1, 1, 'L', 0);
	$pdf -> MultiCell(197, 5, utf8_decode('DESCRIPCIÓN DEL HALLAZGO: '.$row['DESCRIPCIÓN DEL HALLAZGO']), 0, 'L', 0);

	//$pdf -> MultiCell(50, $AltoCelda, $row['PELIGROS'], 1, 0, 'C', 0);
	$pdf -> Cell(100, $AltoCelda, 'EVIDENCIA:', 0, 1, 'L', 0);
	if($img==''){
		$pdf -> Cell(197, 100, 'Sin imagen adjunta', 1, 1, 'C', 0);
		$pdf -> Ln(4);
	}else{
		$pdf -> Cell(197, 100, $pdf -> Image($img, $pdf -> GetX(),$pdf -> GetY(), 98), 0, 1, 'C', 0);
		$pdf -> Ln(4);
	}
	$cadena = strlen($row['DESCRIPCIÓN DEL HALLAZGO']);
	//$pdf -> Cell(30, $AltoCelda, utf8_decode('DESVIACIÓN:'), 0, 0, 'L', 0);
	$pdf -> Cell(197, $AltoCelda, utf8_decode('DESVIACIÓN: '.$row['DESVIACIONES']), 0, 1, 'L', 0);
	
	if ($cadena < 500){
		$pdf -> Cell(200, 40, utf8_decode(''), 0, 1, 'L', 0);
	}else{
		$pdf -> Ln(10);
	}

}
*/
$pdf -> Output();

?>