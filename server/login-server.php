<?php

include("../connection/connection.php");
$pdo = new Conexion();


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods:OPTIONS,POST,GET,DELETE");
header("Allow: POST,OPTIONS,PUT,DELETE");

$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}
$content = $_SERVER["CONTENT_TYPE"];
$method = $_SERVER["REQUEST_METHOD"];
$json = "application/json";


if($method == "POST"){

    if($content == $json ){

    $jsonClient = json_decode(file_get_contents("php://input"));

    if(!$jsonClient){
        exit("No day datos para insertar");
    }

    $email = validation_input($jsonClient->email);
    $password = validation_input($jsonClient->password);
      
    }else{
        $email = validation_input($_POST["email"]);
        $password = validation_input($_POST["clave"]);

        
    }
    
 
    $sql = "CALL Usuario_Registrado(:email,:password);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email',$email);
    $stmt->bindValue(':password',$password);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    header('HTTP/1.1 200 OK');
    echo json_encode($stmt->fetchAll());
   
}



function validation_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


/*
require("../connection/connection.php");
$pdo = new Conexion();
session_start();






if (isset($_GET['cerrar_session'])) {
    session_unset();

    session_destroy();
}

/*
if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
        case 1:
            header('location: admin.php');
            break;

        case 2:
            header('location: colab.php');
            break;

        default:
    }
}
*/

/*if (isset($_POST['email']) && isset($_POST['clave'])) {
    $email = $_POST['email'];
    $password = $_POST['clave'];

    

 
    $sql = "CALL Usuario_Registrado(:email,:password);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_NUM);

    var_dump($row);}*/
/*
    if ($row == true) {
        // validar rol
        $tipoUsuario = $row['1'];
        $rol = $row[2];
        $_SESSION['rol'] = $rol;
        $_SESSION['tipoUsuario'] = $tipoUsuario;

        header('location: menu.php');
    } else {
        // no existe el usuario
        echo "El usuario o contraseña son incorrectos";
    }

}


function validation_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

*/

?>