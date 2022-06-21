<?php

include("../connection/connection.php");

$pdo = new Conexion();

$idDesviacion = input_data($_POST["idDesviacion"]);
$descripcion = input_data($_POST["descripcion"]);
$idempresas = input_data($_POST["idempresas"]);
$idInspeccion = input_data($_POST["idInspeccion"]);
    


if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (!empty($_FILES['picture']['name'])) {

        $result = 0;
        $uploadDir = "../hallazgo/";
        $fileName = time() . '_' . basename($_FILES['picture']['name']);
        $targetPath = $uploadDir . $fileName;
       
      
        if (@move_uploaded_file($_FILES['picture']['tmp_name'], $targetPath)) {
   
            $sql = "CALL insertarHallazgo(:idDesviacion,:descripcion,:idempresas,:idInspeccion,:rutaEvidencia)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':idDesviacion', $idDesviacion);
            $stmt->bindValue(':descripcion', $descripcion);
            $stmt->bindValue(':idempresas', $idempresas);
            $stmt->bindValue(':idInspeccion', $idInspeccion);
            $stmt->bindValue(':rutaEvidencia', $targetPath);           

            if ($stmt->execute()) {
                header("HTTP/1.1 201 ok");
                echo json_encode("success");
                exit;
            } else {
                header("HTTP/1.1 400 ok");
                echo json_encode("error");
                exit;
            }
        }else{
            echo json_encode("no hemos podido guardar la iamgen");
        }
    } else {
        echo json_encode("No hay imagen cargada");
    }
}



function input_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>





