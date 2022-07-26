<?php

include("../connection/connection.php");

$pdo = new Conexion(); 


/* Cabecera para lo permisos de origen */
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: DELETE, OPTIONS");
header("Allow:  OPTIONS, DELETE ");

$method = $_SERVER['REQUEST_METHOD']; /* Variable method para obtener el metodo entrante */

if ($method == "OPTIONS") {
    die();
}

if ($method == "DELETE") {

    /* Json decodificado,  Enviado desde cliente */
    $jsonClient = json_decode(file_get_contents("php://input"));

    
    if (!$jsonClient) {
        exit("No day identificador de hallazgo para eliminar");
    }


    /*Consulta para la busqueda del hallazgo ,para obtener id y ruta */

    $sql1 = "SELECT idHallazgo,Ruta_Evidencia FROM hallazgos WHERE idHallazgo = :idHallazgo";  
    $stmt_2 = $pdo->prepare($sql1);
    $stmt_2->bindValue(':idHallazgo', $jsonClient->idHallazgo);
   
    $stmt_2->execute();
         
    $row = $stmt_2->fetch(PDO::FETCH_ASSOC);

    $ruta = $row['Ruta_Evidencia'];  /*V que contiene ruta del archivo perteneciente al hallazgo */
    $idHallazgo = $row['idHallazgo']; /*V identificador del hallazgo */
    $noImage = "../assets/images/no-image.png"; /* Ruta por defecto de la imagen no adjunta */


    if($ruta != $noImage){

        if(unlink($ruta)){

            $sql = "DELETE FROM hallazgos WHERE idHallazgo = :idHallazgo";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue('idHallazgo', $jsonClient->idHallazgo);
                    
        }
    }else{
        $sql = "DELETE FROM hallazgos WHERE idHallazgo = :idHallazgo";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('idHallazgo', $jsonClient->idHallazgo);
        
        
    }

    if ($stmt->execute()) {
        header('HTTP/1.1 201 OK');
        echo json_encode("success");
    } else {
        header('HTTP/1.1 400 OK');
        echo json_encode("error");
    }   



} else {
    echo json_encode("No id para eliminar hallazgo");
}




