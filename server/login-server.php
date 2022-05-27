<?PHP


include ("../connetion/connection.php");


$json=array();
if (isset($_POST['email']) && isset($_POST['pass']) ){
  
$consulta = "";
$account =htmlentities($_GET['account']);
$pass =htmlentities($_GET['pass']);
  
$resultado=mysqli_prepare($conexion,$consulta); 
if (!$resultado) {
    echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
}

$ok=mysqli_stmt_bind_param($resultado,'ss', $account,$pass);



$ok=mysqli_stmt_execute($resultado);
if (!$ok) {
    echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
}

$ok=mysqli_stmt_bind_result($resultado,$account,$pass); 



/* $consulta->bind_result($json['account'], $json['pass']);*/
$final  = $resultado->get_result();




while($registro=mysqli_fetch_assoc($final)){
//se pasa el vector de registros a un archivo json
$json[]=$registro;


}


mysqli_close($conexion);
echo json_encode($json);

}else{



echo "hola mundo";



}
    
   

		

        
		
?>

