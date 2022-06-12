<?php
	global $IdInsp;
	global $A;
	global $Fech;

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	require "conexion.php";
	$sql2 = "Call DatosInspeccionEncabezado(11)";
	$resultado2 = $mysqli->query($sql2);
	$AltoCelda2 = 9;
	$inspector = "Cristian Torres";

    // Movernos a la derecha
    $this->Cell(200);
	$this->SetTextColor(61, 61, 60);
	// Logo
	//$this->Image('imgCabecera/propuesta curricular-04.jpg',5,5,410);
	$this->Image('./imgCabecera/Cabecera.png',5,5,206);
	$this->Ln(30);
	
	while($row = $resultado2 -> fetch_assoc()){
		$Fech = $row['FECHA'];
		$A = $row['AREA'];
		$IdInsp = $row['ID INSP'];
		$this -> AddFont('Tahoma-Bold', '', 'tahomabd.php');
		$this -> SetFont('Tahoma-Bold','',11);
		$this -> Cell(60, 5, 'FECHA:', 0, 0, 'L', 0);
		$this -> Cell(4, 5, '', 0, 0, 'L', 0);
		$this -> Cell(60, 5, utf8_decode('LOCACIÓN:'), 0, 0, 'L', 0);
		$this -> Cell(4, 5, '', 0, 0, 'L', 0);
		$this -> Cell(60, 5, utf8_decode('ÁREA:'), 0, 1, 'L', 0);
		
		$this -> AddFont('Tahoma', '', 'tahoma.php');
		$this -> SetFont("Tahoma", '', 11);
		$this -> Image('./imgCabecera/Celda.png',$this -> GetX(),$this -> GetY(), 60, $AltoCelda2);
		$this -> Cell(60, $AltoCelda2, utf8_decode($row['FECHA']), 0, 0, 'C', 0);
		$this -> Cell(4, $AltoCelda2, '', 0, 0, 'L', 0);
		$this -> Image('./imgCabecera/Celda.png',$this -> GetX(),$this -> GetY(), 60, $AltoCelda2);
		$this -> Cell(60, $AltoCelda2, utf8_decode($row['LOCACIÓN']), 0, 0, 'C', 0);
		$this -> Cell(4, $AltoCelda2, '', 0, 0, 'L', 0);
		$this -> Image('./imgCabecera/Celda.png',$this -> GetX(),$this -> GetY(), 60, $AltoCelda2);
		$this -> Cell(60, $AltoCelda2, utf8_decode($row['AREA']), 0, 1, 'C', 0);
		
		$this -> Ln(2);
		
		$this -> AddFont('Tahoma-Bold', '', 'tahomabd.php');
		$this -> SetFont('Tahoma-Bold','',11);
		$this -> Cell(92, 5, utf8_decode('RESPONSABLE ÁREA:'), 0, 0, 'L', 0);
		$this -> Cell(4, 5, '', 0, 0, 'L', 0);
		$this -> Cell(92, 5, utf8_decode('INSPECTOR:'), 0, 1, 'L', 0);
		
		$this -> AddFont('Tahoma', '', 'tahoma.php');
		$this -> SetFont("Tahoma", '', 11);
		$this -> Image('./imgCabecera/Celda.png',$this -> GetX(),$this -> GetY(), 92, $AltoCelda2);
		$this -> Cell(92, $AltoCelda2, utf8_decode($row['RESPONSABLE AREA']), 0, 0, 'C', 0);
		$this -> Cell(4, $AltoCelda2, '', 0, 0, 'L', 0);
		$this -> Image('./imgCabecera/Celda.png',$this -> GetX(),$this -> GetY(), 92, $AltoCelda2);
		$this -> Cell(92, $AltoCelda2, utf8_decode($inspector), 0, 1, 'C', 0);
		
		$this -> Ln(2);
				
		$this -> Ln(4);
	}	
	mysqli_close($mysqli);
	$this -> Titulo();
	$this->Ln(2);
	
}
// Titulo de cada página
function Titulo()
{
	//Titulo($NumeroHallazgo)
	//$this -> SetTextColor(255, 255, 255);
	$this -> AddFont('Tahoma-Bold', '', 'tahomabd.php');
	$this -> SetFont('Tahoma-Bold','',18);
	//$this -> SetFillColor(200,220,255);
	$this -> SetTextColor(61, 61, 60);
	//$this -> Cell(188, 10, 'HALLAZGO # '.$NumeroHallazgo, 0, 1, 'C', 1);
	$this -> Cell(188, 10, 'HALLAZGO # '.$this->PageNo(), 0, 1, 'C', 0);
	$this -> Cell(188, 3,$this -> Image('./imgCabecera/Guion.png',$this -> GetX()+88,$this -> GetY(), 12, 0.8), 0, 1, 'C', 0);
	$this->Ln(2);
}



// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}

function DatosH($sql, $resultado)
{
	$AltoCelda = 5;
	$Ancho = 188;
	$Ejex = 0;
	$Ejey = 0;
	$NumeroHallazgo = 0;
	
	while($row = $resultado->fetch_assoc()){
	
		$NumeroHallazgo = $NumeroHallazgo + 1;
		$img = $row['EVIDENCIA'];
		list($an, $al, $ti, $at) = getimagesize($img);
		if($an < 1000){
			$anchoimg = 0;
		}else{
			$anchoimg = 180;
		}
		if($al > 300){
			$altoimg = 100;
		}else{
			$altoimg = 0;
		}
		
		$this -> AddFont('Tahoma-Bold', '', 'tahomabd.php');
		$this -> SetFont('Tahoma-Bold','',11);
		$this -> Cell(50, 7, 'PELIGRO ASOCIADO:', 0, 1, 'L', 0);
		
		$this -> AddFont('Tahoma', '', 'tahoma.php');
		$this -> SetFont("Tahoma", "", 11);
		$this -> Cell($Ancho, $AltoCelda, utf8_decode($row['PELIGROS']), 0, 1, 'L', 0);
		$this -> Ln(4);
		
		$this -> AddFont('Tahoma-Bold', '', 'tahomabd.php');
		$this -> SetFont('Tahoma-Bold','',11);
		$this -> Cell(150, 7, utf8_decode('DESCRIPCIÓN DEL HALLAZGO:'), 0, 1, 'L', 0);
		
		$this -> AddFont('Tahoma', '', 'tahoma.php');
		$this -> SetFont("Tahoma", "", 11);
		$this -> MultiCell($Ancho, 5, utf8_decode($row['DESCRIPCIÓN DEL HALLAZGO']), 0, 'J', 0);
		$this -> Ln(4);
		$this -> AddFont('Tahoma-Bold', '', 'tahomabd.php');
		$this -> SetFont('Tahoma-Bold','',11);
		$this -> Cell(100, $AltoCelda, 'EVIDENCIA:', 0, 1, 'L', 0);
		$this -> Ln(4);
		if($img==''){
			$this -> Cell($Ancho, 100, 'Sin imagen adjunta', 1, 1, 'C', 0);
			$this -> Ln(4);
		}else{
			$this -> Cell(5);
			$this -> Cell(180, 100, $this -> Image($img, $this -> GetX(),$this -> GetY(), $anchoimg, $altoimg), 0, 1, 'C', 0);
			$this -> Ln();
		}
		/*
		$cadena = strlen($row['DESCRIPCIÓN DEL HALLAZGO']);
		
		$this -> AddFont('Tahoma-Bold', '', 'tahomabd.php');
		$this -> SetFont('Tahoma-Bold','',11);
		$this -> Cell(30, 7, utf8_decode('DESVIACIÓN:'), 0, 1, 'L', 0);
		
		$this -> AddFont('Tahoma', '', 'tahoma.php');
		$this -> SetFont("Tahoma", "", 11);
		$this -> Cell($Ancho, $AltoCelda, utf8_decode($row['DESVIACIONES']), 0, 1, 'L', 0);
		
		if ($cadena < 500){
			$this -> Cell($Ancho, 20, utf8_decode(''), 0, 1, 'L', 0);
		}else{
			$this -> Ln(10);
		}
		*/
		
	}
	
}

}
?>