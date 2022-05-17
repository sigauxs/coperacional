<?php 

$hostname_localhost="localhost";
$database_localhost="cpoperacional";
$username_localhost="root";
$password_localhost="";
//variable tipo vector

$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
        
if(mysqli_connect_errno()){
    echo "Fallo al conectar con la BBDD";
    exit();
}



?>