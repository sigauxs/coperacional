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

    <div class="container">
        <div class="row">
            <div class="div--center">
              
            <div class="div--center-images w-card mx-auto">
                <img src="./assets/images/user.png" alt="User logo" class="img-fluid user--size mx-auto">
            </div>
                <div class="card mt-responsive mx-auto div--center-border w-card mb-3" style="z-index: 1;">
                    
                    <div class="card-body">
                    
                    <form action="../server/login-server.php" method="POST" class="needs-validation" novalidate>

                        <div class="mb-3 mt-5 row">
                            <div class="col-sm-12 mb-3">
                                <input type="email" id="email" name="email" class="useFontAwesomeFamily form-control" placeholder="&#xf406;   Usuario" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12 mb-3">
                                <input type="password" id="password" name="clave" class="useFontAwesomeFamily form-control"  placeholder="&#xf084;   Clave" required>
                                <div class="invalid-feedback">
                                    Ingrese un usuario o contraseña valida.
                            </div>
                            </div>
                        
                        </div>



                        <div class="mb-3 row">
                            <div class="col-sm-12 mb-2">
                                <div class="d-grid gap-2">
                                   
                                    <button class="btn btn-danger btn-login rounded-pill fw-bolder" type="submit">Ingresar</button>
                                    
                                    <!--
                                    <a class="btn btn-danger btn-login rounded-pill fw-bolder" href="./menu.php">Ingresar  </a>
                                    -->
                               
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