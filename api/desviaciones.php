<?php


include("../connection/connection.php");
$pdo = new Conexion();
$pdo2 = new Conexion();

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: POST, OPTIONS,GET");
header("Allow: POST, OPTIONS,GET");

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "OPTIONS") {
    die();
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $jsonClient = json_decode(file_get_contents("php://input"));


    if (!$jsonClient) {
        exit("No day datos para insertar");
    }
    echo $jsonClient;

    /*if (($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/png")
        || ($_FILES["file"]["type"] == "image/gif")
    ) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $_FILES['file']['name'])) {
            //more code here...

        } else {
            echo 0;
        }
    } else {
        echo 0;
    }*/
}

/*$sql = "CALL insertarHallazgo(:idDesviacion,:descripcion,:idempresas,:idInspeccion,:rutaEvidencia)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':idDesviacion', $jsonClient->idDesviacion);
$stmt->bindValue(':descripcion', $jsonClient->descripcion);
$stmt->bindValue(':idempresas', $jsonClient->idempresas);
$stmt->bindValue(':idInspeccion', $jsonClient->idInspeccion);
$stmt->bindValue(':rutaEvidencia', $jsonClient->rutaEvidencia);

$stmt->execute();

header("HTTP/1.1 201 ok");
json_encode($stmt2->fetchAll());
exit;*/
