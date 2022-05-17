<?php
include "../connection/connection.php";

$email = $_POST['email'];
$clave = $_POST['clave'];

//variable tipo vector
$json=array();
if (isset($email) && isset($clave) ){
  
    
//conexion a la base de datos
$consulta = "SELECT DISTINCT email, clave FROM users where email = ? and clave = ? ";
$account =htmlentities($email);
$pass =htmlentities($clave);
  
$resultado=mysqli_prepare($conexion,$consulta); 
if (!$resultado) {
    echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
}

$ok=mysqli_stmt_bind_param($resultado,'ss', $email,$clave);



$ok=mysqli_stmt_execute($resultado);
if (!$ok) {
    echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
}

$ok=mysqli_stmt_bind_result($resultado,$email,$clave); 



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