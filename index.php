<?php

include("./connection/connection.php");

$pdo = new Conexion();

session_start();


if (isset($_GET['cerrar_session'])) {
    session_unset();

    session_destroy();
}

if (isset($_POST['email']) && isset($_POST['clave'])) {

    $email = $_POST['email'];
    $password = $_POST['clave'];

    $sql = "CALL Usuario_Registrado(:email,:password);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_NUM);

    var_dump($row);

    if ($row) {
        // validar rol
        $idUsuario = $row['0'];
        $tipoUsuario = $row['1'];
        $rol = $row[2];


        $_SESSION['rol'] = $rol;
        $_SESSION['usuarioId']  = $idUsuario;
        $_SESSION['tipoUsuario'] = $tipoUsuario;

        header('location: menu.php');
    } else {
        $messages = "El usuario o contraseña son incorrectos o no existe";
    }

}


?>



<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Operacional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./css/responsive.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2dd4f6d179.js" crossorigin="anonymous"></script>
</head>

<body>
<?php echo $email ?>
    <div class="container">
        <div class="row">
            <div class="div--center">

                <div class="div--center-images w-card mx-auto">
                    <img src="./assets/images/user.png" alt="User logo" class="img-fluid user--size mx-auto">
                </div>
                <div class="card mt-responsive mx-auto div--center-border w-card mb-3" style="z-index: 1;">

                    <div class="card-body">

               

                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="login" class="needs-validation" novalidate>

                            <div class="mb-3 mt-5 row">
                                <div class="col-sm-12 mb-3">
                                    <input type="email" id="email" name="email" class="useFontAwesomeFamily form-control" placeholder="&#xf406;   Usuario" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-12 mb-3">
                                    <input type="password" id="password" name="clave" class="useFontAwesomeFamily form-control" placeholder="&#xf084;   Clave" required>
                                    <div class="invalid-feedback">
                                        Ingrese un usuario o contraseña valida.
                                    </div>
                                    <div>
                                        <p><?php echo $messages ?></p>
                                    </div>
                                </div>

                            </div>



                            <div class="mb-3 row">
                                <div class="col-sm-12 mb-2">
                                    <div class="d-grid gap-2">

                                        <button class="btn btn-danger btn-login rounded-pill fw-bolder" type="submit">Ingresar</button>





                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="./js/validate.js"></script>

</body>

</html>